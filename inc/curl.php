<?php

    function get_data($url) {
	   $ch = curl_init();
	   $timeout = 5;
	   curl_setopt($ch, CURLOPT_URL, $url);
	   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	   curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	   $data = curl_exec($ch);

	   curl_close($ch);
	   return $data;
     }

     function url_get_ats() {
          $url = 'https://wallet.burst.cryptoguru.org:8125/burst?requestType=getATIds';
          $dt = get_data($url);
          $obj = json_decode($dt);

          $arr = $obj->atIds;
          return $arr;
      }

      function url_get_at($atid) {
          $url = 'https://wallet.burst.cryptoguru.org:8125/burst?requestType=getAT&at=' . $atid;
          $dt  = get_data($url);
          $obj = json_decode($dt);

          $arr = get_object_vars($obj);
          return $arr;
      }

      function url_get_msg($txid) {
          //https://wallet.burst.cryptoguru.org:8125/burst?requestType=getTransaction&transaction=11446690813141928247
          $url = 'https://wallet.burst.cryptoguru.org:8125/burst?requestType=getTransaction&transaction=' . $txid;
          $dt = get_data($url);
          $obj = json_decode($dt);
          $arr = get_object_vars($obj);

          $arr1 = array();
          $arr1['message'] = $arr['attachment']->message;
          $arr1['senderRS'] = $arr['senderRS'];
          $arr1['recipientRS'] = $arr['recipientRS'];

          return $arr1;
      }


     function url_get_acct_txs($acct) {
          //https://wallet.burst.cryptoguru.org:8125/burst?requestType=getAccountTransactions&account=5040551696967756122
          $url = 'https://wallet.burst.cryptoguru.org:8125/burst?requestType=getAccountTransactions&account=' . $acct;
          //echo $url;
          $dt = get_data($url);
          $obj = json_decode($dt);
          $arr = get_object_vars($obj);

          $res = array();
          $temp = $arr ['transactions'];

          foreach ($temp as $t) {
              $arr1 = array();
              $arr1['tx'] = $t->transaction;
              $arr1['sender'] = $t-> sender;
              $arr1['amnt'] = $t-> amountNQT;
              $res[] = $arr1;
          }
          return $res;
     }

     function url_get_last_block() {
          $url = 'https://wallet.burst.cryptoguru.org:8125/burst?requestType=getBlockchainStatus';
          $dt = get_data($url);
          $obj = json_decode($dt);
          $arr = get_object_vars($obj);

          $arr1 = array();
          $arr1['ID'] = $arr['lastBlock'];
          $arr1['height'] = $arr['lastBlockchainFeederHeight'];

          return $arr1;
     }

     function AT_details($arr){
         $name = $arr["name"];
         $at = $arr["at"];
         $atrs = $arr["atRS"];
         $creator = $arr["creator"];
         $creatorrs = $arr["creatorRS"];
         $balance = $arr["balanceNQT"];
         $at = $arr["creator"];
         $atrs = $arr["creatorRS"];
         $desc = $arr["description"];

         $str = array();
         $str[] = "[at]: $at";
         $str[] = "[atRS]: $atrs";
         $str[] = "[creator]: $creator";
         $str[] = "[creatorRS]: $creatorrs";
         $str[] = "[balance]: $balance";
         $str[] = "[name]: $name";
         $str[] = "[desc]: $desc";

         return implode("\n", $str);
     }

?>
