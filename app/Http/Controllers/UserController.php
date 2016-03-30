<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller {
    public function getPeople() {
		return view('User.UserView');
	}
     public function postPeople(Request $request) {
        //Validate that Number of Paragraphs is integer
        $this->validate($request, [
            'num' => 'required|numeric',
       ]);
        $num = $request->input('num');
        $birthday = $request->input('birthday');
        $profile = $request->input('profile');
        $birthdays = array();
		$profiles = array();
		if($birthday)
			$birthdays = $this->getBirthdays($num);
		if($profile)
			$profiles = $this->getProfiles($num);
		$names = $this->getNames($num);
		return view('User.ResultUser')->with('num', $num)
									->with('names', $names)
									->with('birthdays', $birthdays)
									->with('profiles', $profiles);
    }
    
	
	public function getNames($num) {
		$names = ['Sydney', 'Haley', 'Grace', 'Kate','John', 'Brown', 'Mike', 'Boby','Anh','Steve'];
		$names_list = array();
		for($i = 0; $i < $num; $i++)
			array_push($names_list, $names[rand(0, sizeof($names)-1)]);
		return $names_list;
	}
	
	public function getBirthdays($num) {
		$birthdays = array();
		for($i = 0; $i < $num; $i++) {
			$month = rand(1, 12);
			$day = rand(1, 31);
			$year = rand(1980, 2000);
			array_push($birthdays, $month."/".$day."/".$year);
		}
		return $birthdays;
	}
	
	public function getProfiles($num) {
		$profiles = ['Iam young Ceo','I am Musician','I am profesional Athelete','I am Comedian', 'I am Politician', 'I am Teacher',
                     'Iam young Entrepenuer','I am Developer','I am Lawyer','I am Driver Uber'];
		$profiles_list = array();
		for($i = 0; $i < $num; $i++)
			array_push($profiles_list, $profiles[rand(0, sizeof($profiles)-1)]);
		return $profiles_list;
	}
	
}