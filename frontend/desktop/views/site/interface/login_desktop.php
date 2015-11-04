<?php
$date_helper = new date_helper();
$model = new LoginForm();
$model->username = $_POST['username'];
$model->result = 0;
$login = login_helper::create();
$model->result = $login->check();
if ($model->result == login_helper::NO_ERROR) {
	$model->result = $login->login();
	if ($model->result != login_helper::NO_ERROR) {
		echo $model->result;
		exit;
	}
} else {
	echo $model->result;
	exit;
}

echo '<div class="app__top">
	        <!-- <div class="app__menu-btn">
	          <span></span>
	        </div> -->
	        <!-- <svg class="app__icon search svg-icon" viewBox="0 0 20 20"> -->
	          <!-- yeap, its purely hardcoded numbers straight from the head :D (same for svg above) -->
	          <!-- <path d="M20,20 15.36,15.36 a9,9 0 0,1 -12.72,-12.72 a 9,9 0 0,1 12.72,12.72" />
	        </svg> -->
	        <p class="app__hello">Hello, welcome back!</p>
	        <p class="app__hello">您好,欢迎回来!</p>
	        <div class="app__user">
	          <img src="http://img5.duitang.com/uploads/item/201407/07/20140707212215_RHL8S.jpeg" alt="" class="app__user-photo" />
	          <!-- <span class="app__user-notif">3</span> -->
	        </div>
	        <div class="app__month">
	          <!-- <span class="app__month-btn left"></span> -->
	          <p class="app__month-name">' . $date_helper->get_month() . '</p>
	          <!-- <span class="app__month-btn right"></span> -->
	        </div>
	      </div>
	      <div class="app__bot">
	        <div class="app__days">
	          <div class="app__day weekday">' . $date_helper->get_day('-3', 'D') . '</div>
	          <div class="app__day weekday">' . $date_helper->get_day('-2', 'D') . '</div>
	          <div class="app__day weekday">' . $date_helper->get_day('-1', 'D') . '</div>
	          <div class="app__day weekday today">' . $date_helper->get_day('0', 'D') . '</div>
	          <div class="app__day weekday">' . $date_helper->get_day('1', 'D') . '</div>
	          <div class="app__day weekday">' . $date_helper->get_day('2', 'D') . '</div>
	          <div class="app__day weekday">' . $date_helper->get_day('3', 'D') . '</div>
	          <div class="app__day date">' . $date_helper->get_day('-3', 'd') . '</div>
	          <div class="app__day date">' . $date_helper->get_day('-2', 'd') . '</div>
	          <div class="app__day date">' . $date_helper->get_day('-1', 'd') . '</div>
	          <div class="app__day date today">' . $date_helper->get_day('0', 'd') . '</div>
	          <div class="app__day date">' . $date_helper->get_day('1', 'd') . '</div>
	          <div class="app__day date">' . $date_helper->get_day('2', 'd') . '</div>
	          <div class="app__day date">' . $date_helper->get_day('3', 'd') . '</div>
	        </div>
	        <div class="app__meetings">
	          <div class="app__meeting">
	            <img src="http://i.imgur.com/joyWJEY.jpg" alt="" class="app__meeting-photo" />
	            <p class="app__meeting-name"><a href="http://www.wangrunxin.com">进入主页</a></p>
	             <p class="app__meeting-info">
	              <span class="app__meeting-time">www.wangrunxin.com</span>
	            </p>
	          </div>
	          <div class="app__meeting">
	            <img src="http://i.imgur.com/joyWJEY.jpg" alt="" class="app__meeting-photo" />
	             <p class="app__meeting-name"><a href="www.wangrunxin.com">留言</a></p>
	             <p class="app__meeting-info">
	              <span class="app__meeting-time">给我留个信儿吧</span>
	            </p>
	          </div>
	          <div class="app__meeting">
	            <img src="http://i.imgur.com/joyWJEY.jpg" alt="" class="app__meeting-photo" />
	             <p class="app__meeting-name"><a href="http://www.wangrunxin.com">看看这家伙是谁</a></p>
	             <p class="app__meeting-info">
	              <span class="app__meeting-time">关于开发者</span>
	            </p>
	          </div>
	        </div>
	      </div>
	      <!-- <div class="app__logout">
	        <svg class="app__logout-icon svg-icon" viewBox="0 0 20 20">
	          <path d="M6,3 a8,8 0 1,0 8,0 M10,0 10,12"/>
	        </svg>
	      </div> -->';

class date_helper {

	public function get_month() {
		$str = "";
		$month = date("m", time());
		switch ($month) {
		case '1':
			$str = "Jan. | 一月";
			break;
		case '2':
			$str = "Feb. | 二月";
			break;
		case '3':
			$str = "Mar. | 三月";
			break;
		case '4':
			$str = "Apr. | 四月";
			break;
		case '5':
			$str = "May  | 五月";
			break;
		case '6':
			$str = "Jun. | 六月";
			break;
		case '7':
			$str = "Jul. | 七月";
			break;
		case '8':
			$str = "Aug. | 八月";
			break;
		case '9':
			$str = "Sep. | 九月";
			break;
		case '10':
			$str = "Oct. | 十月";
			break;
		case '11':
			$str = "Nov. | 十一月";
			break;
		case '12':
			$str = "Dec. | 十二月";
			break;
		default:
			$str = "Jan. | 一月";
			break;
		}
		return $str;
	}

	public function get_day($num, $type) {
		$str = $num . " day";
		return date($type, strtotime($str));
	}
}

?>