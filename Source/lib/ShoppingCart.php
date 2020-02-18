<?php
    class Product{
        var $id;
        var $num;
    }
    class ShoppingCart{
        var $listProduct;

        public function __construct()
        {
            $this->listProduct = array();
        }

        public function update($id, $newNum){
            for($i = 0; $i <count($this->listProduct); $i++){
                if($this->listProduct[$i]->id == $id){
                    $this->listProduct[$i]->num = $newNum;
                }
            }
        }

        public function delete($id){
            
            for($i = 0; $i < count($this->listProduct); $i++){
                if($this->listProduct[$i]->id == $id){
                    array_splice($this->listProduct, $i, 1);
                }
            }
        }

        public function add($id){
            if(count($this->listProduct)==0){
                //Chưa có sản phẩm trong giỏ hàng
                $p = new Product();
                $p->id = $id;
                $p->num = 1;

                $this->listProduct[] = $p;
            }
            else{
                //Đã có sản phẩm trong giỏ hàng rồi
                //Cần kiểm tra sản phẩm đã có tồn tại trong giỏ hàng chưa
                //nếu đã có rồi thì chỉ cần cập nhật số lượng trên 1
                //nếu chưa có thì thêm mới sản phẩm đó vào giỏ hàng 

                for($i = 0; $i<count($this->listProduct); $i++){
                    if($this->listProduct[$i]->id==$id)
                        break;
                }

                if($i == count($this->listProduct)){
                    $p = new Product();
                    $p ->id = $id;
                    $p ->num = 1;

                    $this->listProduct[]=$p;
                }
                else{
                    $this->listProduct[$i]->num++;
                }      
            }
        }
    }
?>