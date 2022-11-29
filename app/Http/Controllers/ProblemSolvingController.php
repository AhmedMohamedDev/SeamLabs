<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProblemSolvingController extends Controller
{
    /**
     * exceptFive
     *
     * @param  mixed $request
     * @return void
     */
    public function exceptFive(Request $request)
    {
        $cnt = 0;
        $start = (int) $request->start;
        $end   = (int) $request->end;
        for($i = abs($start); $i <= abs($end); $i++){ 
            if(str_contains(strval($i),"5")) continue;
            $cnt+= 1;
        }

        echo "Result = ".$cnt;
    }
    
    /**
     * alphabitToNumber
     *
     * @param  mixed $request
     * @return void
     */
    public function alphabitToNumber(Request $request)
    {
        $chars = strval($request->string);
        $res = 0;
        for ($i=0; $i < strlen($chars); $i++) { 
            $res *= 26;
            $res += ord($chars[$i]) - ord('A') +1;
        }
        echo "Result = ". $res;
    }
    
    /**
     * minimumMoves
     *
     * @param  mixed $request
     * @return Json
     */
    public function minimumMoves(Request $request)
    {
        $res   = [];
        $numbers = array_map('intval', explode(',', $request->array));
        foreach($numbers as $num){
            $this->countMoves($num,$res);
        }

        return response()->json($res);
    }

    public function productCombination($num)
    { 
        $root = sqrt($num);
        for($i = 1; $i <= $root; $i++){
        $a = $num / $i;
            if(!is_float($a) && $a !== 1 && $i !== 1){
                return max($a,$i);
            }            
        }
        return PHP_INT_MAX;
    }

    public $moves = 1;
    public function countMoves($num,&$res)
    {
        $minNum = min($this->productCombination($num),$num-1);
        if($minNum < 0) return;
        if($minNum > 0){ 
            $this->moves++;
            $this->countMoves($minNum,$res);
        }else{
            $res[] = $this->moves;
            $this->moves = 1;
        }
    }
}
