<?php
namespace App\Helpers;

class SraHelper
{
      public function bladeHelper($str1,$str2)
      {
        $cnt_highest  = $cnt_arrayintersecct = $mostmatch1 = $mostmatch2 = $mostmatch = $percent_match = 0;
        $most_match_str = "Not Match";

        if($str1 == "Not Available")
          $str1 = "";
        if($str2 == "Not Available")
          $str2 = "";

        if(!empty($str1) && !empty($str2)){
          //convert string to lowercase
          $str1=strtolower($str1);
          $str2=strtolower($str2);

          //remove special characters from string
          $str1_remove_special_character = preg_replace('/[0-9%$?]/s','', $str1);
          $str2_remove_special_character = preg_replace('/[^A-Za-z0-9 ]/',' ', $str2);

          //convert string to array
          $str1_arr = explode(' ', $str1_remove_special_character);
          $str2_arr = explode(' ', $str2_remove_special_character);

          //count length
          $str1_len = str_word_count($str1_remove_special_character);
          $str2_len = str_word_count($str2_remove_special_character);

          //find big string and get count
          if($str1_len > $str2_len){
          $cnt_highest = $str1_len;
          }
          if($str1_len < $str2_len){
          $cnt_highest = $str2_len;
          }
          if($str1_len == $str2_len){
          $cnt_highest = $str2_len;
          }

          //get total matching words from two array
          $result = array_intersect($str1_arr, $str2_arr);

          //remove element if null value
          $result = array_filter($result);
          
          //get count of total matching words
          $cnt_arrayintersecct  = count($result);

          //get total percentage 
            if($cnt_arrayintersecct > 0){
              $percent_match = round($cnt_arrayintersecct * 100 / $cnt_highest) ;

              //find most match string
              $mostmatch1 = round($cnt_arrayintersecct * 100 / $str1_len);
              $mostmatch2 = round($cnt_arrayintersecct * 100 / $str2_len);

              if($mostmatch1 > $mostmatch2){
              $most_match_str = $str1;
              }
              if($mostmatch1 < $mostmatch2){
              $most_match_str = $str2;
              }
              if($mostmatch1 == $mostmatch2){
              $most_match_str = $str2;
              }
            }
        }
        $final_result = array("match_string"=>$most_match_str,"percentage"=>$percent_match);
        return $final_result;
      }

      public function integration_return_single_value($array)
      {
      $s1 = $s2 = $s3 = "";
        if(isset($array)){
          if(isset($array[0])){
             $s1 = trim(str_replace("  "," ",strtolower($array[0])));
          }
          if(isset($array[1])){
             $s2 = trim(str_replace("  "," ",strtolower($array[1])));
          }
          if(isset($array[2])){
             $s3 = trim(str_replace("  "," ",strtolower($array[2])));
          }
         
         
         
        }
        
        if ($s1 == "not available") 
          $s1="";
        if ($s2 == "not available") 
          $s2="";
        if ($s3 == "not available") 
          $s3="";
        $isStrEmpt1=0;
                $isStrEmpt2=0;
                $isStrEmpt3=0;

                if (empty($s1)) 
                {
                  $isStrEmpt1=0;
                }
                else
                {
                  $isStrEmpt1=1;
                }

                if (empty($s2)) 
                {
                  $isStrEmpt2=0;
                }
                else
                {
                  $isStrEmpt2=1;
                }

                if (empty($s3)) 
                {
                  $isStrEmpt3=0;
                }
                else
                {
                  $isStrEmpt3=1;
                }

                $result=0;

                  
                  if ($isStrEmpt1+$isStrEmpt2+$isStrEmpt3 == 0)
                {
                    $result=0;
                    $finalString="Not Available";
                }

                if ($isStrEmpt1+$isStrEmpt2+$isStrEmpt3 == 1)
                {
                    $result=0.3333;
                    If ($isStrEmpt1==1)
                        $finalString=$s1;
                    If ($isStrEmpt2==1)
                        $finalString=$s2;
                    If ($isStrEmpt3==1)
                        $finalString=$s3;
                }

                if ($isStrEmpt1+$isStrEmpt2+$isStrEmpt3 == 2)
                {
                    
                    if ($isStrEmpt1==1 && $isStrEmpt2==1)
                    {
                        If ($s1==$s2)
                        {
                            $result=0.6666;
                            $finalString=$s1;
                        }
                        else
                        {
                            $result = $this->wordSimilarity2($s1, $s2);
                            $finalString=$s2;
                        }
                    }
                    
                    if ($isStrEmpt2==1 && $isStrEmpt3==1)
                    {
                        If ($s2==$s3)
                        {
                            $result=0.6666;
                            $finalString=$s2;
                        }
                        else
                        {
                            $result = $this->wordSimilarity2($s2, $s3);
                            $finalString=$s3;            
                        }
                    }
                    
                    if ($isStrEmpt1==1 && $isStrEmpt3==1)
                    {
                        If ($s1==$s3)
                        {
                            $result=0.6666;
                            $finalString=$s1;
                        } 
                        else
                        {
                            $result = $this->wordSimilarity2($s1, $s3);
                            $finalString=$s3; 
                        }
                    }
                }

                if ($isStrEmpt1+$isStrEmpt2+$isStrEmpt3 == 3)
                {
                    If ($s1==$s2 && $s2==$s3)
                    {
                        $result=1;
                        $finalString=$s3; 
                    }
                    
                    elseIf ($s1==$s2 || $s2==$s3 || $s1==$s3)
                    {
                        $result=0.6666;
                        
                        if ($s1==$s2)
                        {
                            $result = $result + ($this->wordSimilarity2($s1, $s3)/3);
                            $finalString=$s2;
                        }
                        if ($s2==$s3)
                        {
                            $result = $result + ($this->wordSimilarity2($s2, $s1)/3);
                            $finalString=$s2;
                        }
                        if ($s1==$s3)
                        {
                            $result = $result + ($this->wordSimilarity2($s1, $s2)/3);
                            $finalString=$s3;
                        }
                      
                    }
                    else
                    {
                        $result = $this->wordSimilarity3($s1, $s2, $s3);
                        $finalString=$s3;
                    }
                    
                    
                    
                    
                    
                }
                   //$similarityPercentage = round($result * 100, 2);
                  return ucwords($finalString);
      }

       public function integration_return_value_percentage($array)
      {
        //print_r($array);
      $i = $result = 0;
      $highestPercentageOfString = 0;
                  $highestPercentageString = "";
                  
               
                  $arr_len = count($array);
                  $isStrEmpt1 = $isStrEmpt2 = $isStrEmpt3 = 0;
                  $s1 = $s2 = $s3 = $finalString = "";
                  if($arr_len > 0){
                  
                    foreach($array as $data){
                      $i++;
                      if($data == "Not Available"){
                        
                        ${"s".$i} = "";
                        ${"isStrEmpt".$i} = 0;
                      }elseif($data == ""){
                         
                        ${"s".$i} = "";
                        ${"isStrEmpt".$i} = 0;
                      }else{
                         
                        ${"isStrEmpt".$i} = 1;
                        ${"s".$i} = strtolower($data);
                      }
                    }
                  }
                 // echo $s1."/".$s2."/".$s3."<br/>";
                  if ($isStrEmpt1+$isStrEmpt2+$isStrEmpt3 == 0)
                  {
                      $result=0;
                      $finalString="Not Available";
                  }

                  if ($isStrEmpt1+$isStrEmpt2+$isStrEmpt3 == 1)
                  {
                      $result=0.3333;
                      If ($isStrEmpt1==1)
                          $finalString=$s1;
                      If ($isStrEmpt2==1)
                          $finalString=$s2;
                      If ($isStrEmpt3==1)
                          $finalString=$s3;
                  }
                  if ($isStrEmpt1+$isStrEmpt2+$isStrEmpt3 == 2)
                  {


                      if ($isStrEmpt1==1 && $isStrEmpt2==1)
                      {
                         
                          If ($s1==$s2)
                          {
                              $result=0.6666;
                              $finalString=$s1;
                          }
                          else
                          {
                            //echo "out";
                              $result = $this->wordSimilarity2($s1, $s2);
                              $finalString=$s2;
                          }
                      }
                      
                      if ($isStrEmpt2==1 && $isStrEmpt3==1)
                      {
                          
                          If ($s2==$s3)
                          {
                              $result=0.6666;
                              $finalString=$s2;
                          }
                          else
                          {
                              $result = $this->wordSimilarity2($s2, $s3);
                              $finalString=$s3;            
                          }
                      }
                      
                      if ($isStrEmpt1==1 && $isStrEmpt3==1)
                      {
                        
                          If ($s1==$s3)
                          {
                              $result=0.6666;
                              $finalString=$s1;
                          } 
                          else
                          {
                              $result = $this->wordSimilarity2($s1, $s3);
                              $finalString=$s3; 
                          }
                      }
                  }

                  if ($isStrEmpt1+$isStrEmpt2+$isStrEmpt3 == 3)
                  {

                      If ($s1==$s2 && $s2==$s3)
                      {
                          $result=1;
                      }
                      
                      elseIf ($s1==$s2 || $s2==$s3 || $s1==$s3)
                      {
                          $result=0.6666;
                          
                          if ($s1==$s2)
                          {
                              
                              $result = $result + ($this->wordSimilarity2($s1, $s3)/3);
                              $finalString=$s2;
                          }
                          if ($s2==$s3)
                          {
                                
                              $result = $result + ($this->wordSimilarity2($s2, $s1)/3);
                              $finalString=$s2;
                          }
                          if ($s1==$s3)
                          {
                              
                              $result = $result + ($this->wordSimilarity2($s1, $s2)/3);
                              $finalString=$s3;
                          }
                        
                      }
                      else
                      {
                           
                          $result = $this->wordSimilarity3($s1, $s2, $s3);
                          $finalString=$s3;
                      }
                      
                      
                      
                      
                      
                  }
                  $highestPercentageOfString = round($result * 100, 2);
                  $highestPercentageString = ucwords($finalString);
                  
                  $final_result = array("match_string"=>$highestPercentageString,"percentage"=>$highestPercentageOfString);
                  return $final_result;

                 // return $finalString;
      }

       public function integration_return_value_percentage_data($array)
      {
        $s1 = $s2 = $s3 = "";
        if(isset($array)){
          if(isset($array[0])){
             $s1 = trim(str_replace("  "," ",strtolower($array[0])));
          }
          if(isset($array[1])){
             $s2 = trim(str_replace("  "," ",strtolower($array[1])));
          }
          if(isset($array[2])){
             $s3 = trim(str_replace("  "," ",strtolower($array[2])));
          }
         
         
         
        }
        
        if ($s1 == "not available") 
          $s1="";
        if ($s2 == "not available") 
          $s2="";
        if ($s3 == "not available") 
          $s3="";
        $isStrEmpt1=0;
                $isStrEmpt2=0;
                $isStrEmpt3=0;

                if (empty($s1)) 
                {
                  $isStrEmpt1=0;
                }
                else
                {
                  $isStrEmpt1=1;
                }

                if (empty($s2)) 
                {
                  $isStrEmpt2=0;
                }
                else
                {
                  $isStrEmpt2=1;
                }

                if (empty($s3)) 
                {
                  $isStrEmpt3=0;
                }
                else
                {
                  $isStrEmpt3=1;
                }

                $result=0;

                if ($isStrEmpt1+$isStrEmpt2+$isStrEmpt3 == 0)
                {
                    $result=0;
                    $finalString="Not Available";
                }

                if ($isStrEmpt1+$isStrEmpt2+$isStrEmpt3 == 1)
                {
                    $result=0.3333;
                    If ($isStrEmpt1==1)
                        $finalString=$s1;
                    If ($isStrEmpt2==1)
                        $finalString=$s2;
                    If ($isStrEmpt3==1)
                        $finalString=$s3;
                }

                if ($isStrEmpt1+$isStrEmpt2+$isStrEmpt3 == 2)
                {
                    
                    if ($isStrEmpt1==1 && $isStrEmpt2==1)
                    {
                        If ($s1==$s2)
                        {
                            $result=0.6666;
                            $finalString=$s1;
                        }
                        else
                        {
                            $result = $this->wordSimilarity2($s1, $s2);
                            $finalString=$s2;
                        }
                    }
                    
                    if ($isStrEmpt2==1 && $isStrEmpt3==1)
                    {
                        If ($s2==$s3)
                        {
                            $result=0.6666;
                            $finalString=$s2;
                        }
                        else
                        {
                            $result = $this->wordSimilarity2($s2, $s3);
                            $finalString=$s3;            
                        }
                    }
                    
                    if ($isStrEmpt1==1 && $isStrEmpt3==1)
                    {
                        If ($s1==$s3)
                        {
                            $result=0.6666;
                            $finalString=$s1;
                        } 
                        else
                        {
                            $result = $this->wordSimilarity2($s1, $s3);
                            $finalString=$s3; 
                        }
                    }
                }

                if ($isStrEmpt1+$isStrEmpt2+$isStrEmpt3 == 3)
                {
                    If ($s1==$s2 && $s2==$s3)
                    {
                        $result=1;
                        $finalString=$s3; 
                    }
                    
                    elseIf ($s1==$s2 || $s2==$s3 || $s1==$s3)
                    {
                        $result=0.6666;
                        
                        if ($s1==$s2)
                        {
                            $result = $result + ($this->wordSimilarity2($s1, $s3)/3);
                            $finalString=$s2;
                        }
                        if ($s2==$s3)
                        {
                            $result = $result + ($this->wordSimilarity2($s2, $s1)/3);
                            $finalString=$s2;
                        }
                        if ($s1==$s3)
                        {
                            $result = $result + ($this->wordSimilarity2($s1, $s2)/3);
                            $finalString=$s3;
                        }
                      
                    }
                    else
                    {
                        $result = $this->wordSimilarity3($s1, $s2, $s3);
                        $finalString=$s3;
                    }
                    
                    
                    
                    
                    
                }
                   $similarityPercentage = round($result * 100, 2);
                  
                  $final_result = array("match_string"=>ucwords($finalString),"percentage"=>$similarityPercentage);
                  return $final_result;

                 // return $finalString;
      }

      public function wordSimilarity2($s1,$s2) {

                  $words1 = preg_split('/\s+/',$s1);
                  $words2 = preg_split('/\s+/',$s2);
                  $diffs1 = array_diff($words2,$words1);
                  $diffs2 = array_diff($words1,$words2);

                  $diffsLength = strlen(join("",$diffs1).join("",$diffs2));
                  $wordsLength = strlen(join("",$words1).join("",$words2));
                  if(!$wordsLength) return 0;

                  $differenceRate = ( $diffsLength / $wordsLength );
                  $similarityRate = 1 - $differenceRate;
                  return $similarityRate;

              }
      public function wordSimilarity3($s1, $s2, $s3 = null) {
                  $words1 = preg_split('/\s+/', $s1);
                  $words2 = preg_split('/\s+/', $s2);
                  $diffs1 = array_diff($words2, $words1);
                  $diffs2 = array_diff($words1, $words2);
                  
                  if ($s3) {
                      $words3 = preg_split('/\s+/', $s3);
                      $diffs3 = array_diff($words2, $words3);
                      $diffs4 = array_diff($words1, $words3);
                      $diffsLength = strlen(join("", $diffs1) . join("", $diffs2) . join("", $diffs3) . join("", $diffs4));
                      $wordsLength = strlen(join("", $words1) . join("", $words2) . join("", $words3));
                  } else {
                      $diffsLength = strlen(join("", $diffs1) . join("", $diffs2));
                      $wordsLength = strlen(join("", $words1) . join("", $words2));
                  }
                  
                  if (!$wordsLength) return 0;
                  
                  $differenceRate = ($diffsLength / $wordsLength);
                  $similarityRate = 1 - $differenceRate;
                  return $similarityRate;
              }
     public function startQueryLog()
     {
           \DB::enableQueryLog();
     }

     public function showQueries()
     {
          dd(\DB::getQueryLog());
     }

     public static function instance()
     {
         return new SraHelper();
     }
}