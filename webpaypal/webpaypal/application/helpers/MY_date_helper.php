<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	/**
	 * Lay ngay thang tu time
	 * @param int	 $time	Timestamp
	 * @param string $type 	Loai format ('' | 'time' | 'full')
	 * %d-%m-%Y - %H:%i:%s
	 */
	function get_date($time = '')
	{
		$time = (!$time) ? now() : $time;
		
		$format = "%d-%m-%Y";
		$date 	= mdate($format, $time);
		
		return $date;
	}
	
	/**
	 * Lay thong tin cua thoi gian
	 * @param int	$time	Timestamp
	 */
	function get_time_info($time = '')
	{
		$time = (!$time) ? now() : $time;
		
		$info = array();
		$info['d'] 	= intval(mdate('%d', $time));
		$info['m'] 	= intval(mdate('%m', $time));
		$info['y'] 	= intval(mdate('%Y', $time));
		$info['h'] 	= intval(mdate('%H', $time));
		$info['mi'] = intval(mdate('%i', $time));
		$info['s'] 	= intval(mdate('%s', $time));
		
		return $info;
	}
	
	
	/**
	 * Tinh thoi gian quy ra giay tu ngay thang nam
	 * @param string 	$date	Ngay thang nam dau vao
	 * @param string 	$format	Format cua $date
	 */
	function get_time_from_date($date, $format = '')
	{
		// Xu ly format
		$format = ($format == '') ? "%d-%m-%Y" : $format;
		$format = str_replace(array('%', ' '), '', $format);
		$format = strtolower($format);
		
		// Phan tich input
		$arr_date 	= explode('-', $date);
		$arr_format = explode('-', $format);
		if (count($arr_date) != 3 || count($arr_format) != 3)
		{
			return FALSE;
		}
		
		// Lay gia tri ngay thang nam
		$time = array();
		foreach ($arr_format as $k => $v)
		{
			$time[$v] = intval(trim($arr_date[$k]));
		}
		
		$timestamp = mktime(0, 0, 0, $time['m'], $time['d'], $time['y']);
		
		return $timestamp;
	}
	
	/**
	 * Lay khoang thoi gian bat dau va ket thuc (tinh ra giay) tu moc thoi gian co dinh
	 * @param string 	$date (Neu date la %d-%m-%Y thi phai theo forma)
	 * @return array($time_start, $time_end)
	 * @$type : kieu lay theo ngay hay thang
	 */
	function get_time_between($date, $type = '')
	{
		// Neu khong ton tai date
		if (!$date)
		{
			return FALSE;
		}

		// Neu date la moc thoi gian co dinh (dạng ngày - tháng -năm)
		$time = explode('-', $date);
		if(count($time) < 3)
		{
		   return FALSE;
		}
		
		$d = $time[0];//lay ngay
		$m = $time[1];//lay thang
		$y = $time[2];//lay nam
		if($type == '')
		{
			$time_start = mktime(0, 0, 0, $m, $d, $y);//lay thoi gian bat dau 1 ngay
			$time_end   = mktime(24, 0, 0, $m, $d, $y);//thoi gian ket thuc 1 ngay
		}
		else 
		{
		    $time_start = mktime(0, 0, 0, $m, 1, $y);//lay thoi gian bat dau trong thang do
		    if($m == '12')
		    {
		       $m = 0;
		       $y = $y + 1;
		    }
		    $time_end    = mktime(0, 0, 0, $m+1, 1, $y);//lay thoi gian ket thuc trong thang do   
		
		}
		
		$data = array('start' => $time_start, 'end' => $time_end);
		return $data;
	}
	
	/**
	 * Lay khoang thoi gian bat dau va ket thuc (tinh ra giay) tu moc thoi gian co dinh
	 * @param string 	$date  va $date2 (Neu date la %d-%m-%Y thi phai theo forma)
	 * @return array($time_start, $time_end)
	 */
	function get_time_between_day($date, $date1 = '')
	{
		// Neu khong ton tai date
		if (!$date1)
		{
			$date1 = $date;
		}

		// Neu date la moc thoi gian co dinh (dạng ngày - tháng -năm)
		//lay ngay bat dau
		$time = explode('-', $date);
		if(count($time) < 3)
		{
		   return FALSE;
		}
		$d = $time[0];//lay ngay bat dau
		$m = $time[1];//lay thang
		$y = $time[2];//lay nam
		
		//lay ngay ket thuc
	    $time1 = explode('-', $date1);
		if(count($time1) < 3)
		{
		   return FALSE;
		}
		$d1 = $time1[0];//lay ngay ket thuc
		$m1 = $time1[1];//lay thang
		$y1 = $time1[2];//lay nam
		
		$time_start = mktime(0, 0, 0, $m, $d, $y);//lay thoi gian bat dau tu ngay 
		$time_end   = mktime(24, 0, 0, $m1, $d1, $y1);//thoi gian ket thuc den ngay
		
		$data = array('start' => $time_start, 'end' => $time_end);
		return $data;
	}