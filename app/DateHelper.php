<?php

namespace App;


class DateHelper 
{
    //
	public static function returnToday(){
		return date("Y-m-d");
	}

	public  static  function getDayInWeekFromTime($time = null){
	    if($time == null) {
	        $time = time();
        }

	    return date('w', strtotime($time)) + 1;
    }

    public static function getDaysToMakeRequest($created_at = null){

	    if($created_at == null){
	        return 0;
        }

        $today_in = self::getDayInWeekFromTime(); // 6
        $target_day = self::getDayInWeekFromTime($created_at); // 5

        if($today_in >= $target_day ){
            return $today_in - $target_day;
        }
        return (7 - $today_in ) + ($target_day - 1);




    }
}
