<!-- Este documento solo hace funcionar el carrito -->
<?php

//Esta linea genera una sesion en la cookie, para no perder el carrito
session_start();

class Cart {
	protected $cartContent = array();

	public function __construct(){
		if (!empty($_SESSION['cartContent'])){
			$this->cartContent = $_SESSION['cartContent'];
		}else{
			$this->cartContent = NULL;
		}
		if($this->cartContent === NULL){
			$this->cartContent = array('cartTotal' => 0, 'totalItems' => 0);
		}
	}

	public function content(){
		$cart = array_reverse($this->cartContent);
		unset($cart['totalItems']);
		unset($cart['cartTotal']);
		return $cart;
	}

	public function getItem($row_id){
		return (in_array($row_id, array('totalItems', 'cartTotal'), TRUE) OR !isset($this->cartContents[$row_id]))
			? FALSE
			: $this->cartContent[$row_id];
	}

	public function totalItems(){
		return $this->cartContent['totalItems'];
	}

	public function total(){
		 return $this->cartContent['cartTotal'];
	}

	public function insert($item = array()){ //Esto tambien se altera si modificas lo de la orden en archivo de galletas
		if(!is_array($item) OR count($item) === 0){
			return FALSE;
		}else{
			if(!isset($item['id'], $item['name'], $item['price'], $item['qty'])){
				return FALSE;
			}else{
				$item['qty'] = (float) $item['qty'];
				if($item['qty']==0){
					return FALSE;
				}

				$item['price'] = (float) $item['price'];
				$rowid = md5($item['id']);
				$oldQty = isset($this->cartContent[$rowid]['qty']) ? (int) $this -> cartContent[$rowid]['qty']:0;
				
				$item['rowid'] = $rowid;//este tambien conecta (creo)
				$item['qty'] += $oldQty;
				$this->cartContent[$rowid] = $item;

				if($this->saveCart()){
					return isset($rowid) ? $rowid : TRUE;
				}else{
					return FALSE;
				}
			}
		}
	}

	public function update($item = array()){
		if(!is_array($item) OR count($item) ===0){
			return FALSE;
		}else{
			if(!isset($item['rowid'], $this->cartContent[$item['rowid']])){
				return FALSE;
			}else{
				if(isset($item['qty'])){
					$item['qty'] = (float) $item['qty'];
					
					if($item['qty']==0){
						unset($this->cartContent[$item['rowid']]);
						return TRUE;
					}
				}
			

			$keys = array_intersect(array_keys(array($this->cartContent[$item['rowid']])), array_keys($item));

			if(isset($item['price'])){
				$item['price'] = (float) $item ['price'];
			}

			foreach(array_diff($keys, array('id', 'name')) as $key){
				$this->cartContent[$item['rowid']][$key] = $item[$key];
			}

			$this->saveCart();
			return TRUE;
			}
		}
	}

	protected function saveCart(){
		$this->cartContent['totalItems'] = $this->cartContent['cartTotal'] = 0;
		foreach($this->cartContent as $key => $val){

			if(!is_array($val) OR !isset($val['price'], $val['qty'])){
				continue;
			}

			$this->cartContent['cartTotal'] += ($val['price'] * $val['qty']);
			$this->cartContent['totalItems'] += $val['qty'];
			$this->cartContent[$key]['subtotal'] = ($this->cartContent[$key]['price'] * $this->cartContent[$key]['qty']);
		}

		if(count($this->cartContent) <= 2){
			unset($_SESSION['cartContent']);
			return FALSE;
		}else{
			$_SESSION['cartContent'] = $this->cartContent;
			return TRUE;
		}
	}

	public function remove($row_id){
		unset($this->cartContent[$row_id]);
		$this->saveCart();
		return TRUE;
	}

	public function destroy(){
		$this->cartContent = array('cartTotal' => 0, 'totalItems' =>0);
		unset($_SESSION['cartContents']);
	}
}




?>