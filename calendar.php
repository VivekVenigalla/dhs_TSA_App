<!DOCTYPE HTML>
<html>
    <body>
        <head>
            <title>Alumni Share - Blog</title>
            <link rel = "stylesheet" href = "calendar.css">
            <h1 class = "title_head"><img src = "handscollberation.png" alt = "logo" width = 50>Peer Share</h1>
            
            <h2>Calendar</h2>
            
            <?php
                class Calendar {  
                     
                    /**
                     * Constructor
                     */
                    public function __construct(){     
                        $this->naviHref = htmlentities($_SERVER['PHP_SELF']);
                    }
                     
                    /********************* PROPERTY ********************/  
                    private $dayLabels = array("Mon","Tue","Wed","Thu","Fri","Sat","Sun");
                     
                    private $currentYear=0;
                     
                    private $currentMonth=0;
                     
                    private $currentDay=0;
                     
                    private $currentDate=null;
                     
                    private $daysInMonth=0;
                     
                    private $naviHref= null;
                     
                    /********************* PUBLIC **********************/  
                        
                    /**
                    * print out the calendar
                    */
                    public function show() {
                        $year  = null;
                         
                        $month = null;
                         
                        if(null==$year&&isset($_GET['year'])){
                 
                            $year = $_GET['year'];
                         
                        }else if(null==$year){
                 
                            $year = date("Y",time());  
                         
                        }          
                         
                        if(null==$month&&isset($_GET['month'])){
                 
                            $month = $_GET['month'];
                         
                        }else if(null==$month){
                 
                            $month = date("m",time());
                         
                        }                  
                         
                        $this->currentYear=$year;
                         
                        $this->currentMonth=$month;
                         
                        $this->daysInMonth=$this->_daysInMonth($month,$year);  
                        $content='<div class = "cal">'; 
                        $content.='<div id="calendar">'.
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
                              
                        return '<a href = "?num=' . date('Y-m',strtotime($this->currentYear.'-'.$this->currentMonth.'-1')) . "-" . $cellContent .'"><li id="li-'.$this->currentDate.'" class="'.($cellNumber%7==1?' start ':($cellNumber%7==0?' end ':' ')).
                                ($cellContent==null?'mask':'').'">'.$cellContent.'</li></a>';
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
                                '<a class="prev" href="'.$this->naviHref.'?month='.sprintf('%02d',$preMonth).'&year='.$preYear.'">Prev</a>'.
                                    '<span class="title">'.date('Y M',strtotime($this->currentYear.'-'.$this->currentMonth.'-1')).'</span>'.
                                '<a class="next" href="'.$this->naviHref.'?month='.sprintf("%02d", $nextMonth).'&year='.$nextYear.'">Next</a>'.
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
            ?>
        </head>
        
        <!--<table bgcolor="lightgrey"
            cellspacing="15" cellpadding="15">
    
            <caption align="top">
            </caption>
            <thead>
                <tr>
                    <th>Sun</th>
                    <th>Mon</th>
                    <th>Tue</th>
                    <th>Wed</th>
                    <th>Thu</th>
                    <th>Fri</th>
                    <th>Sat</th>
                </tr>
            </thead>
            <form action = '' method = "post">
            <tbody>
                <tr>
                    <td><button name = 'foo' value = '1'>1</button></td>
                    <td><button name = 'foo' value = '2'>2</button></td>
                    <td><button name = 'foo' value = '3'>3</button></td>
                    <td><button name = 'foo' value = '4'>4</button></td>
                    <td><button name = 'foo' value = '5'>5</button></td>
                    <td><button name = 'foo' value = '6'>6</button></td>
                    <td><button name = 'foo' value = '7'>7</button></td>
                </tr>
                <tr>
                    <td><button name = 'foo' value = '8'>8</button></td>
                    <td><button name = 'foo' value = '9'>9</button></td>
                    <td><button name = 'foo' value = '10'>10</button></td>
                    <td><button name = 'foo' value = '11'>11</button></td>
                    <td><button name = 'foo' value = '12'>12</button></td>
                    <td><button name = 'foo' value = '13'>13</button></td>
                    <td><button name = 'foo' value = '14'>14</button></td>
                </tr>
                <tr>
                    <td><button name = 'foo' value = '15'>15</button></td>
                    <td><button name = 'foo' value = '16'>16</button></td>
                    <td><button name = 'foo' value = '17'>17</button></td>
                    <td><button name = 'foo' value = '18'>18</button></td>
                    <td><button name = 'foo' value = '19'>19</button></td>
                    <td><button name = 'foo' value = '20'>20</button></td>
                    <td><button name = 'foo' value = '21'>21</button></td>
                </tr>
                <tr>
                    <td><button name = 'foo' value = '22'>22</button></td>
                    <td><button name = 'foo' value = '23'>23</button></td>
                    <td><button name = 'foo' value = '24'>24</button></td>
                    <td><button name = 'foo' value = '25'>25</button></td>
                    <td><button name = 'foo' value = '26'>26</button></td>
                    <td><button name = 'foo' value = '27'>27</button></td>
                    <td><button name = 'foo' value = '28'>28</button></td>
                </tr>
                <tr>
                    <td><button name = 'foo' value = '29'>29</button></td>
                    <td><button name = 'foo' value = '30'>30</button></td>
                    <td><button name = 'foo' value = '31'>31</button></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
            </form>
        </table>-->
    </body>
</html>
