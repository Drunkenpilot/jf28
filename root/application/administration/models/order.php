<?php
class Order extends ActiveRecord\Model{
	static $belongs_to=array(
		array('member','class_name'=>'member' ),array('shop','class_name'=>'shop' ),array('deliveryaddress','class_name'=>'deliveryaddress')
	);

	function generate($year,$month)
	{
		 $this->config->load('calendar');   
    	$this->load->library('calendar');
    	$cal_data = order::get_calendar_data($year,$month);
    	return $this->calendar->generate($year,$month,$cal_data);
    	
		
	}
	
	function generate_tool($year,$month)
	{
		$config['start_day'] = 'monday';
		$config['month_type'] = 'long';
		$config['day_type'] = 'long';
		$config['show_next_prev'] = TRUE;
		$config['next_prev_url'] = site_url('tool/tools/by_month');
		$config['template'] = '

   {table_open}<table border="0" cellpadding="0" cellspacing="0" class="calendar">{/table_open}

   {heading_row_start}<tr class="cal_header">{/heading_row_start}

   {heading_previous_cell}<th><a href="{previous_url}">&lt;&lt;</a></th>{/heading_previous_cell}
   {heading_title_cell}<th colspan="{colspan}">{heading}</th>{/heading_title_cell}
   {heading_next_cell}<th><a href="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}

   {heading_row_end}</tr>{/heading_row_end}

   {week_row_start}<tr class="cal_week">{/week_row_start}
   {week_day_cell}<td>{week_day}</td>{/week_day_cell}
   {week_row_end}</tr>{/week_row_end}

   {cal_row_start}<tr class="days">{/cal_row_start}
   {cal_cell_start}<td>{/cal_cell_start}

   {cal_cell_content}<div class="day_num">{day}</div><div class="cal_content">{content}</div>{/cal_cell_content}
   {cal_cell_content_today}<div class="day_num highlight">{day}</div><div class="cal_content">{content}</div>{/cal_cell_content_today}

   {cal_cell_no_content}<div class="day_num">{day}</div>{/cal_cell_no_content}
   {cal_cell_no_content_today}<div class="day_num highlight">{day}</div>{/cal_cell_no_content_today}

   {cal_cell_blank}&nbsp;{/cal_cell_blank}

   {cal_cell_end}</td>{/cal_cell_end}
   {cal_row_end}</tr>{/cal_row_end}

   {table_close}</table>{/table_close}
';

		$this->load->library('calendar',$config);
		$cal_data = order::get_calendar_data($year,$month);
		return $this->calendar->generate($year,$month,$cal_data);
			

	}

	 function get_calendar_data($year,$month)
	{
		 
		 $cal_data = order::find('all',array('select'=>'order_time','conditions'=>array('order_time LIKE ?', $year.'-'.$month.'%')));
		 $cal_day = array();

		 foreach ($cal_data as $row){
		 	$cal_num = order::find('all',array('select'=>'order_time, total','conditions'=>array('order_time LIKE ?', $row->order_time->format('Y-m-d').'%')));
		 	$cal_day[substr($row->order_time->format('Y-m-d'),8,2)*1] = '[ '.count($cal_num).' orders ]';
		 }
		 
		
	return $cal_day;
		echo var_dump( $cal_data);
	  
	}
	
}
