<?php 
    class SanPham extends Db{
        
        public function updateProduct($tenSanPham, $gia, $moTa, $maSanPham){
            $sql = "update SanPham set tenSanPham = ?, gia = ?, moTa = ? where maSanPham = ?";
            return $this->update($sql, array($tenSanPham, $gia, $moTa, $maSanPham));
        }
        
        public function updateImage($hinh, $maSanPham){
            $sql = "update SanPham set hinh = ? where maSanPham = ?";
            return $this->update($sql, array($hinh, $maSanPham));
        }
        
        public function getByID($id){
            $sql = "select * from SanPham where maSanPham = ?";
            $data = $this->select($sql, array($id));
            if($data != null){
                return $data[0];
            }
            return null;
        }
        
        public function getOnRequest($type, $role, $search){
            $sql = "SELECT * from SanPham ";
            if($search != ''){
                $search = "%" . $search . "%";
                $sql .= "where tenSanPham like ? ";
                $sql .= " order by " . $type . " " . $role;
                return $this->select($sql, array($search));
            }
            $sql .= " order by " . $type . " " . $role;
            return $this->select($sql);
        }
        
        public function deleteProduct($id){
            return $this->delete("DELETE FROM `SanPham` WHERE maSanPham = ?", array($id));
        }
        
        public function checkName($name){
            $name = trim($name);
            return $this->select("select * from SanPham where tenSanPham = ?", array($name));
        }
        
        public function getAll(){
            return $this->select("select * from SanPham");
        }
        
        public function getMaxID(){
            $data =  $this->select("SELECT `AUTO_INCREMENT` as maxID FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'id20058093_nhilaundry' AND TABLE_NAME = 'SanPham'");
            if($data == null){
                return "";
            }
            return $data[0]["maxID"];
        }
        
        public function insertProduct($tenSanPham, $gia, $moTa, $hinh){
            return $this->insert("INSERT INTO `SanPham`(`tenSanPham`, `gia`, `moTa`, `hinh`) VALUES (?, ?, ?, ?)", array($tenSanPham, $gia, $moTa, $hinh));
        }
    }
?>