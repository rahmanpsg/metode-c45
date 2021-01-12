<?php 
	include 'koneksi.php';
	function getRoot($value='')
	{
		include 'koneksi.php';

		$data = $koneksi->query("SELECT root,attribut,kelas FROM tbl_pohon");

		foreach ($data as $key => $value) {
			$rules[] = $value;
		}

		$root = $rules[0]['root'];

		for ($i=0; $i < count($rules); $i++) { 
			if (array_search($root, $rules[$i])) {
				$res[] = $i;	
			}
		}

		foreach ($res as $key => $value) {
			if ($value > 0) {
				$root_akhir[] = $value - 1;
			}	
		}
		array_push($root_akhir,count($rules));

		foreach ($root_akhir as $key => $value) {
			$root_key[] = array($res[$key],$value);
		}

		for ($i=0; $i < count($root_key); $i++) { 
			foreach ($rules as $key => $value) {
				if ($key >= $root_key[$i][0] AND $key <= $root_key[$i][1]) {
					$result[$i][] = $value;
				}				
			}
			
		}

		return $result;
	}

	function getChildRoot($value='')
	{
		$root = array_values($value);

		foreach ($root as $key => $value) {
			if (isset($value[1])) {
				$childroot[] = $value[1]['root'];
			}else{
				$childroot[] = '-';
			}

			for ($i=0; $i < count($value); $i++) { 
				if ($childroot[$key] != '-') {
					if ($value[$i]['root'] == $childroot[$key]) {
						if ($value[$i]['kelas'] != '-') {
							$root_key[$key][] = array('root'=>$value[$i]['root'],
													  // 'key'=>$i,
													  'kelas'=>$value[$i]['kelas']);
						}else{
							$root_key[$key][] = array('root'=>$value[$i]['root'],
												  'forward'=>$value[$i+1]['root']);
						}
					}
				}else{
					$root_key[$key] = array('nilai'=>$value[$i]['kelas']);
				}
			}
		}

		// foreach ($root_key as $x => $kasus) {
		// 	if (!isset($kasus[1])) {
		// 		$result[] = $kasus;
		// 	}else{
		// 		for ($i=0; $i < count($kasus); $i++) { 
		// 			$result[$x][] = array('root'=>$kasus[$i]['root'],'forward'=>array($kasus[$i]['forward']));
		// 		}
		// 	}
		// }

		return $root_key;
	}

	function getChild($val)
	{
		for ($i=0; $i < count($val); $i++) { 
			$res[] = $val[$i][0]['kelas'];
		}

		return $val;
	}

	// $root = getRoot();
	// $childroot = getChildRoot($root);

	// print_r($root[0]);
	// echo "<hr>";
	// print_r($childroot);

	// include 'koneksi.php';

	// $data = $koneksi->query("SELECT root,attribut,kelas FROM tbl_pohon");

	// foreach ($data as $key => $value) {
	// 	$rules[] = $value;
	// }

	// $root = $rules[0]['root'];
	// $root_data = array_values($rules);

	// for ($i=0; $i < count($rules); $i++) { 
	// 	if (array_search($root, $rules[$i])) {
	// 		foreach ($rules as $key => $value) {
	// 			if ($key == $i) {
	// 				// print_r($value);
	// 				if ($value['kelas'] != '-') {
	// 					$data_pohon[$value['root']][] = array('kasus'=>$value['attribut'],'nilai'=>$value['kelas']);
	// 				}else{
	// 					$data_pohon[$value['root']][] = array('kasus'=>$value['attribut'],'forward'=>$value['kelas']);
	// 				}
	// 			}
	// 		}
	// 	}
	// }

	// echo "<ul>";
	// foreach ($root_data as $key => $value) {
	// 	if ($value['kelas'] != '-') {
	// 		echo "<li>if ", strtoupper($value['root']), " : ", strtoupper($value['attribut']) ,"</li>";
 //            echo "&nbsp;&nbsp;&nbsp; return ", strtoupper($value['kelas']), "<br>";
	// 	}else{
	// 		echo "<li>if ", strtoupper($value['root']), " : ", strtoupper($value['attribut'])," </li>";
	// 	}
	// }

	function klasifikasi($attribut, $val = '')
    {
        include 'koneksi.php';
        $data = $koneksi->query("SELECT * FROM tbl_klasifikasi WHERE attribut = '$attribut'");
        
        foreach ($data as $key) {
            if ($key['operator'] == 'Between') {
                $value = json_decode($key['value']);
                
                if ($val >= (int) $value[0] AND $val <= (int) $value[1]) {
                    return $key['klasifikasi'];
                }
            }else
            if ($key['operator'] == '=') {
                $value = $key['value'];

                if ($val == $value){
                    return $key['klasifikasi'];
                }
            }else
            if ($key['operator'] == '>=') {
                $value = $key['value'];

                if ($val >= (int) $value){
                    return $key['klasifikasi'];
                }
            }else
            if ($key['operator'] == '>') {
                $value = $key['value'];

                if ($val > (int) $value){
                    return $key['klasifikasi'];
                }
            }
            if ($key['operator'] == '<=') {
                $value = $key['value'];

                if ($val <= (int) $value){
                    return $key['klasifikasi'];
                }
            }else
            if ($key['operator'] == '<') {
                $value = $key['value'];

                if ($val < (int) $value){
                    return $key['klasifikasi'];
                }
            }

        }
    }

	function CariNilai($array, $search_list)
	{
	    foreach ($array as $key => $value) {
	        $keys = array_keys($value);
	        for ($i=0; $i < count($keys); $i++) { 
	            if ($keys[$i] != 'nilai') {
	                if ($value[$keys[$i]] == $search_list[$keys[$i]]) {
	                    $nilai[$key][$keys[$i]] = $value[$keys[$i]];
	                    // print_r($value[$keys[$i]]);
	                    // echo "<hr>";
	                }else{
	                    continue 2;
	                }
	            }else{
	                $nilai[$key][$keys[$i]] = $value[$keys[$i]];
	            }
	        }
	    }
	    if (isset(max($nilai)['nilai'])) {
			return max($nilai)['nilai'];
		}else{
			return null;
		}
	}

	function getForward($val=''){
            $id = $val['id'];
            $koneksi = mysqli_connect('localhost','root','','c45');
            $data = $koneksi->query("SELECT * FROM tbl_pohon");     

            foreach ($data as $key => $value) {
                if ($key < $id) {
                    $res[] = $value;
                }
            }
            $i=count($res)-1;
            $forward = $res[$i]['forward'];
            while($forward != ''){
                $result['nilai'] = $val['kelas'];
                $result[$val['root']] = $val['attribut'];
                if ($res[$i]['root'] == $forward) {
                    $result[$res[$i]['root']] = $res[$i]['attribut'];
                    $forward = $res[$i]['forward'];
                }
                $i--;
            }

            if (!isset($result)) {
                $result['nilai'] = $val['kelas'];
                $result[$val['root']] = $val['attribut'];
            }

            return array_reverse($result);
        }


	

	// $data_pohon = $koneksi->query("SELECT REPLACE(GROUP_CONCAT(data SEPARATOR '%SEP_ARRAY%'), ']%SEP_ARRAY%[', ', ') as data from tbl_pohonkeputusan GROUP BY JSON_EXTRACT(data, '$.penghasilan') ORDER BY id DESC");
 //        foreach ($data_pohon as $key => $value) {
 //            $pohon[] = $value['data'];
 //        }

 //        // print_r(json_decode(explode('%SEP_ARRAY%', $pohon[2])[0]));
 //        for ($i=0; $i < count($pohon); $i++) { 
 //        	if (json_decode($pohon[$i]) !== null) {
 //        		$array[] = (array) json_decode($pohon[$i]);
 //        	}else{
 //        		$max = explode('%SEP_ARRAY%', $pohon[$i]);
 //        		for ($y=0; $y < count($max); $y++) { 
 //        			$array[$i][] = ((array) json_decode($max[$y]));
 //        			// $merge[] = $array[$i][$y];
 //        		}
 //        	}
			
 //        }

        // foreach ($array as $key => $value) {
        // 	foreach ($value as $k => $v) {
        // 		if (!is_array($v)) {
        // 			$output[] = array('id'=>$key+1,'name'=>$k, 'attribut'=>$v,'parent_id'=>$key);
        // 		}
        // 	}
        // }

        // foreach ($res_pohonkeputusan as $key => $value) {
        // 	$root = array_keys($value);
        // 	foreach ($value as $k => $v) {
        		
        // 	}
        // }

        // print_r($output);
        // print_r($merge);
        // print_r(array_merge_recursive_unique($merge[0],$merge[1],$merge[2],$merge[3],$merge[4],$merge[5],$merge[6],$merge[7],$merge[8],$merge[9],$merge[10],$merge[11],$merge[12],$merge[13],$merge[14],$merge[15],$merge[16],$merge[17],$merge[18]));
        // $arr = $merge[0];
        // for ($i=0; $i < count($merge) - 1; $i++) { 
        	// $arr = array_merge_recursive_unique($arr,$merge[1]);	
        	// $arr1 = array_merge_recursive_unique($arr,$merge[2]);
        	// $arr2 = array_merge_recursive_unique($arr1,$merge[3]);
        	// $arr3 = array_merge_recursive_unique($arr2,$merge[4]);
        	// $arr4 = array_merge_recursive_unique($arr3,$merge[5]);
        	// $arr5 = array_merge_recursive_unique($arr4,$merge[6]);
        // }

        
        // createTreeView($merge,0);
        $data_pohon = $koneksi->query("SELECT * FROM tbl_pohon");
        // foreach ($data_pohon as $key => $value) {
        //     $pohon[] = $value;
        // }

        $arrayCategories = array();
 
		while($row = mysqli_fetch_assoc($data_pohon)){ 
		 $arrayCategories[$row['id']] = array("parent_id" => $row['parent_id'], "name" =>                       
		 $row['root'], "attribut" => $row['attribut'], "kelas" => $row['kelas']);   
		  }

		  createTreeView($arrayCategories, 0);

        function createTreeView($array, $currentParent, $currLevel = 0, $prevLevel = -1) {

foreach ($array as $categoryId => $category) {

if ($currentParent == $category['parent_id']) {                       
    if ($currLevel > $prevLevel) echo " <ol class='tree'> "; 

    if ($currLevel == $prevLevel) echo " </li> ";

    echo '<li> <label for="subfolder2">'.$category['name'].' : '.$category['attribut'];
     if($category['kelas'] != '-'): echo ' Nilai = '.$category['kelas']; endif;
    echo '</label> <input type="checkbox" name="subfolder2"/>';

    if ($currLevel > $prevLevel) { $prevLevel = $currLevel; }

    $currLevel++; 

    createTreeView ($array, $categoryId, $currLevel, $prevLevel);

    $currLevel--;               
    }   

}

if ($currLevel == $prevLevel) echo " </li>  </ol> ";

}   

        
        function whatever($array, $key, $val) {
    foreach ($array as $item)
        if (isset($item[$key]) && $item[$key] == $val)
            return true;
    return false;
}

	
function array_merge_recursive_unique($array1, $array2) {
    foreach($array2 AS $k => $v) {
        if(!isset($array1[$k]))
        {
            $array1[$k] = $v;
        }
        else
        {

            if(!is_array($v)){
                if(is_array($array1[$k]))
                {
                    if(!in_array($v,$array1[$k]))
                    {
                        $array1[$k][] = $v;
                    }
                }
                else
                {
                    if($array1[$k] != $v)
                        $array1[$k] = array($array1[$k], $v);
                 }
            }
            else
            {
                $array1[$k] = array_merge_recursive_unique($array1,$array2[$k]);

            }
           
        }
   
    }
      unset($k, $v);
      return $array1;
}
?>
<script src="vendor/jquery/jquery.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		var merge = <?php echo json_encode($merge); ?>;
		var i = 0;
		var arr = [];
		var data = [
		$.each(merge,function(key,value){
			$.each(value,function(k,v){
				// arr[i] = k + ' = ' + v;
				{id='key','parent'= '#', 'text'= v}
				if (k == 'nilai') {
					i--;
				}else{
					i++;
				}
			})
		})
		]

		console.log(data);
		
		var treeData = {
			
			  name: 'My Tree',
			  children: [
			    { name: 'hello' },
			    { name: 'wat' },
			    {
			      name: 'child folder',
			      children: [
			        {
			          name: 'child folder',
			          children: [
			            { name: 'hello' },
			            { name: 'wat' }
			          ]
			        },
			        { name: 'hello' },
			        { name: 'wat' },
			        {
			          name: 'child folder',
			          children: [
			            { name: 'hello' },
			            { name: 'wat' }
			          ]
			        }
			      ]
			    }
			  ]
			}

			console.log(treeData);
	})
</script>