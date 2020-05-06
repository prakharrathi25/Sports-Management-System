<?php
/*
 * Load function based on the Ajax request
 */
if(isset($_POST['func']) && !empty($_POST['func'])){
    switch($_POST['func']){
        case 'getCalender':
            getCalender($_POST['year'],$_POST['month']);
            break;
        case 'getEvents':
            getEvents($_POST['date']);
            break;
        default:
            break;
    }
}

/*
 * Generate event calendar in HTML format
 */
function getCalender($year = '', $month = ''){
    $dateYear = ($year != '')?$year:date("Y");
    $dateMonth = ($month != '')?$month:date("m");
    $date = $dateYear.'-'.$dateMonth.'-01';
    $currentMonthFirstDay = date("N",strtotime($date));
    $totalDaysOfMonth = cal_days_in_month(CAL_GREGORIAN,$dateMonth,$dateYear);
    $totalDaysOfMonthDisplay = ($currentMonthFirstDay == 7)?($totalDaysOfMonth):($totalDaysOfMonth + $currentMonthFirstDay);
    $boxDisplay = ($totalDaysOfMonthDisplay <= 35)?35:42;
?>
    <div class="calendar-wrap">
        <div class="cal-nav">
            <a href="javascript:void(0);" onclick="getCalendar('calendar_div','<?php echo date("Y",strtotime($date.' - 1 Month')); ?>','<?php echo date("m",strtotime($date.' - 1 Month')); ?>');">&laquo;</a>
            <select class="month_dropdown"><?php echo getAllMonths($dateMonth); ?></select>
            <select class="year_dropdown"><?php echo getYearList($dateYear); ?></select>
            <a href="javascript:void(0);" onclick="getCalendar('calendar_div','<?php echo date("Y",strtotime($date.' + 1 Month')); ?>','<?php echo date("m",strtotime($date.' + 1 Month')); ?>');">&raquo;</a>
        </div>
        <div id="event_list" class="none"></div>
        <div class="calendar-days">
            <ul>
                <li>SUN</li>
                <li>MON</li>
                <li>TUE</li>
                <li>WED</li>
                <li>THU</li>
                <li>FRI</li>
                <li>SAT</li>
            </ul>
        </div>
        <div class="calendar-dates">
            <ul>
            <?php
                $dayCount = 1;
                $eventNum = 0;
                for($cb=1;$cb<=$boxDisplay;$cb++){
                    if(($cb >= $currentMonthFirstDay+1 || $currentMonthFirstDay == 7) && $cb <= ($totalDaysOfMonthDisplay)){
                        // Current date
                        $currentDate = $dateYear.'-'.$dateMonth.'-'.$dayCount;

                        // Make the database connection
                        $server = "localhost";
                        $username = "root";
                        $password = "mysql@123";
                        $dbname = "sports-database";
                        $db = mysqli_connect($server, $username, $password, $dbname);

                        if ($db->connect_errno) {
                            die("Failed to connect to MySQL: " . $db->connect_error);
                        }

                        // Get number of events based on the current date
                        $result = $db->query("SELECT eventID FROM events WHERE Date = '".$currentDate."' ");
                        $eventNum = $result->num_rows;

                        // Define date cell color
                        if(strtotime($currentDate) == strtotime(date("Y-m-d"))){
                            echo '<li date="'.$currentDate.'" class="grey date_cell">';
                        }elseif($eventNum > 0){
                            echo '<li date="'.$currentDate.'" class="light_sky date_cell">';
                        }else{
                            echo '<li date="'.$currentDate.'" class="date_cell">';
                        }

                        // Date cell
                        echo '<span>';
                        echo $dayCount;
                        echo '</span>';

                        // Hover event popup
                        echo '<div id="date_popup_'.$currentDate.'" class="date_popup_wrap none">';
                        echo '<div class="date_window">';
                        echo '<div class="popup_event">Events ('.$eventNum.')</div>';
                        echo ($eventNum > 0)?'<a href="javascript:;" onclick="getEvents(\''.$currentDate.'\');">view events</a>':'';
                        echo '</div></div>';

                        echo '</li>';
                        $dayCount++;
            ?>
            <?php }else{ ?>
                <li><span>&nbsp;</span></li>
            <?php } } ?>
            </ul>
        </div>
    </div>

    <script>
        function getCalendar(target_div, year, month){
            $.ajax({
                type:'POST',
                url:'functions.php',
                data:'func=getCalender&year='+year+'&month='+month,
                success:function(html){
                    $('#'+target_div).html(html);
                }
            });
        }

        function getEvents(date){
            $.ajax({
                type:'POST',
                url:'functions.php',
                data:'func=getEvents&date='+date,
                success:function(html){
                    $('#event_list').html(html);
                    $('#event_list').slideDown('slow');
                }
            });
        }

        $(document).ready(function(){
            $('.date_cell').mouseenter(function(){
                date = $(this).attr('date');
                $(".date_popup_wrap").fadeOut();
                $("#date_popup_"+date).fadeIn();
            });
            $('.date_cell').mouseleave(function(){
                $(".date_popup_wrap").fadeOut();
            });
            $('.month_dropdown').on('change',function(){
                getCalendar('calendar_div', $('.year_dropdown').val(), $('.month_dropdown').val());
            });
            $('.year_dropdown').on('change',function(){
                getCalendar('calendar_div', $('.year_dropdown').val(), $('.month_dropdown').val());
            });
            $(document).click(function(){
                $('#event_list').slideUp('slow');
            });
        });
    </script>
<?php
}

/*
 * Generate months options list for select box
 */
function getAllMonths($selected = ''){
    $options = '';
    for($i=1;$i<=12;$i++)
    {
        $value = ($i < 10)?'0'.$i:$i;
        $selectedOpt = ($value == $selected)?'selected':'';
        $options .= '<option value="'.$value.'" '.$selectedOpt.' >'.date("F", mktime(0, 0, 0, $i+1, 0, 0)).'</option>';
    }
    return $options;
}

/*
 * Generate years options list for select box
 */
function getYearList($selected = ''){
    $options = '';
    for($i=2019;$i<=2025;$i++)
    {
        $selectedOpt = ($i == $selected)?'selected':'';
        $options .= '<option value="'.$i.'" '.$selectedOpt.' >'.$i.'</option>';
    }
    return $options;
}

/*
 * Generate events list in HTML format
 */
function getEvents($date = ''){
    // Include the database config file
    include_once 'dbConfig.php';

    $eventListHTML = '';
    $date = $date?$date:date("Y-m-d");

    // Fetch events based on the specific date
    $result = $db->query("SELECT teamA, teamB, Date, eventID FROM events WHERE date = '".$date."' ");
    if($result->num_rows > 0){
        $eventListHTML = '<h2>Events on '.date("l, d M Y",strtotime($date)).'</h2>';
        $eventListHTML .= '<ul>';
        while($row = $result->fetch_assoc()){
            $eventListHTML .= '<li>'.$row['teamA'].'</li>';
        }
        $eventListHTML .= '</ul>';
    }
    echo $eventListHTML;
}
