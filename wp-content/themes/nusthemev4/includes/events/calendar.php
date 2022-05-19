<?php
class Calendar {

    /**
     * Constructor
     */
    public function __construct(){
        $this->naviHref = htmlentities($_SERVER['PHP_SELF']);
    }

    /********************* PROPERTY ********************/
    private $dayLabels = array("M","T","W","T","F","S","S");
    private $currentYear=0;
    private $currentMonth=0;
    private $currentDay=0;
    private $currentDate=null;
    private $daysInMonth=0;
    private $naviHref= null;
    private $eventDates=null;

    /********************* PUBLIC **********************/

    /**
    * print out the calendar
    */
    public function show($arrDates) {
        $year  = null;
        $month = null;
        $this->eventDates = $arrDates;

        if(null==$year&&isset($_POST['eventyear'])){
            $year = $_POST['eventyear'];
        }else if(null==$year){
            $year = date("Y",time());
        }

        if(null==$month&&isset($_POST['eventmonth'])){
            $month = $_POST['eventmonth'];
        }else if(null==$month){
            $month = date("m",time());
        }

        $this->currentYear=$year;
        $this->currentMonth=$month;

        $this->daysInMonth=$this->_daysInMonth($month,$year);

        $content='<div id="events-module-cal">'.
                        '<div class="box">'.
                        $this->_createNavi().
                        '</div>'.
                        '<div class="box-content">'.
                                '<ul class="label">'.$this->_createLabels().'</ul>';
                                $content.='<div class="clear"></div>';
                                $content.='<ul class="dates">';

                                $weeksInMonth = $this->_weeksInMonth($month,$year);
                                // Create weeks in a month
                                for( $i=0; $i<$weeksInMonth; $i++ ){

                                    //Create days in a week
                                    for($j=1;$j<=7;$j++){
                                        $content.=$this->_showDay($i*7+$j);
                                    }
                                }

                                $content.='</ul>';

                                $content.='<div class="clear"></div>';

                        $content.='</div>';

        $content.='</div>';
        return $content;
    }

    /********************* PRIVATE **********************/
    /**
    * create the li element for ul
    */
    private function _showDay($cellNumber){

        if($this->currentDay==0){
            $firstDayOfTheWeek = date('N',strtotime($this->currentYear.'-'.$this->currentMonth.'-01'));
            if(intval($cellNumber) == intval($firstDayOfTheWeek)){
                $this->currentDay=1;
            }
        }

        if( ($this->currentDay!=0)&&($this->currentDay<=$this->daysInMonth) ){
            $this->currentDate = date('Y-m-d',strtotime($this->currentYear.'-'.$this->currentMonth.'-'.($this->currentDay)));
            $cellContent = $this->currentDay;
            $this->currentDay++;
        }else{
            $this->currentDate =null;
            $cellContent=null;
        }

        $date = explode("-",$this->currentDate)[2];
        $hasEvent = false;

        if($date != null)
          if($this->eventDates != null)
            for ($i = 0; $i < sizeof($this->eventDates); $i++){
              if ($date == $this->eventDates[$i]){
                $hasEvent = true;
                array_splice($this->eventDates,$i,1);
              }
            }

        return '<li id="li-'.$this->currentDate.'" class="'.($cellNumber%7==1?' start ':($cellNumber%7==0?' end ':' ')).
                ($cellContent==null?'mask':'').($hasEvent==true?' has-event ':'').(date("Y-m-d")==$this->currentDate?' today ':'').'">'.($cellContent==null?'&nbsp':$cellContent).'</li>';
    }

    /**
    * create navigation
    */
    private function _createNavi(){

        $nextMonth = $this->currentMonth==12?1:intval($this->currentMonth)+1;
        $nextYear = $this->currentMonth==12?intval($this->currentYear)+1:$this->currentYear;

        $preMonth = $this->currentMonth==1?12:intval($this->currentMonth)-1;
        $preYear = $this->currentMonth==1?intval($this->currentYear)-1:$this->currentYear;

        return
            '<div class="header">'.
                '<form action="" id="prevMonth" method="post"><input type="hidden" value="'.$preYear.'" name="eventyear"><input type="hidden" value="'.$preMonth.'" name="eventmonth">'.
                '<a class="prev" href="javascript:jQuery(\'#prevMonth\').submit();"><i class="fas fa-angle-left"></i></a>'.
                '</form>'.
                    '<span class="title">'.date('F Y',strtotime($this->currentYear.'-'.$this->currentMonth.'-1')).'</span>'.
                '<form action="" id="nextMonth" method="post"><input type="hidden" value="'.$nextYear.'" name="eventyear"><input type="hidden" value="'.$nextMonth.'" name="eventmonth">'.
                '<a class="next" href="javascript:jQuery(\'#nextMonth\').submit();"><i class="fas fa-angle-right"></i></a>'.
                '</form>'.
            '</div>';
    }

    /**
    * create calendar week labels
    */
    private function _createLabels(){

        $content='';

        foreach($this->dayLabels as $index=>$label){
            $content.='<li class="'.($label==6?'end title':'start title').' title">'.$label.'</li>';
        }

        return $content;
    }



    /**
    * calculate number of weeks in a particular month
    */
    private function _weeksInMonth($month=null,$year=null){

        if( null==($year) ) {
            $year =  date("Y",time());
        }

        if(null==($month)) {
            $month = date("m",time());
        }

        // find number of days in this month
        $daysInMonths = $this->_daysInMonth($month,$year);
        $numOfweeks = ($daysInMonths%7==0?0:1) + intval($daysInMonths/7);
        $monthEndingDay= date('N',strtotime($year.'-'.$month.'-'.$daysInMonths));
        $monthStartDay = date('N',strtotime($year.'-'.$month.'-01'));

        if($monthEndingDay<$monthStartDay){
            $numOfweeks++;
        }

        return $numOfweeks;
    }

    /**
    * calculate number of days in a particular month
    */
    private function _daysInMonth($month=null,$year=null){

        if(null==($year))
            $year =  date("Y",time());

        if(null==($month))
            $month = date("m",time());

        return date('t',strtotime($year.'-'.$month.'-01'));
    }

}
