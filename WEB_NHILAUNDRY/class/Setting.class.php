<?php
    class Setting extends Db{
        
        public function getSetting(){
            $data = $this->select("select * from Setting");
            if($data != null){
                return $data[0];
            }
            return null;
        }
        
        public function updateSetting($content, $sign, $video, $headerVideo, $descriptionVideo, $storeName, $date, $time, $site, $phone1, $phone2, $mail){
            $sql = "UPDATE Setting SET `content` = ?, `sign` = ?, `video` = ?, `header` = ?, `videoDescription` = ?, `storeName` = ?, `date` = ?, `time` = ?, `site` = ?, `phone1` = ?, `phone2` = ?, `mail` = ?";
            return $this->update($sql, array($content, $sign, $video, $headerVideo, $descriptionVideo, $storeName, $date, $time, $site, $phone1, $phone2, $mail));
        }
    }
?>