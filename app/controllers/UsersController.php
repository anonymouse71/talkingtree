<?php
class UsersController extends \BaseController {

	public function loginpage()
	{
		return View::make('user.login');
	}

	public function doLogin()
	{
		$email = Input::get('email');
        $password = Input::get('password');
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return Redirect::intended('/');
        } else {
            // login failed, go back to the login screen
            Session::flash('errorMessage', 'Login failed.');
            return Redirect::back();
        }
	}

	public function getLogout()
    {
        Auth::logout();
        return Redirect::action('HomeController@homePage');
    }

    public function getContact()
    {
        $from = Input::get('from');
        $email = Input::get('email');
        $subject = Input::get('subject');
        $body = Input::get('body');

        $data = [
            'from'=>$from,
            'email'=>$email,
            'subject'=>$subject,
            'body'=>$body
        ];

        Mail::send('emails.contact', $data, function($message) use ($data)
        {
            $message->from($data['email'], $data['from']);
            $message->to('gastonlenotre@gmail.com', 'Talking Tree')->subject($data['subject']);
        });
        Session::flash('successMessage', 'Your email is sent');
        return Redirect::action('HomeController@homePage');
    }


    public function userProfile($id)
    {
        if (Auth::user()->id == $id)
        {
            $user = User::find($id);
            $user_id = Auth::id();
            $orders = Order::where('user_id',$user_id)->get();
            return View::make('user.profile')->with('user', $user)->with('orders', $orders);
        }
        
    }

    public function showLogin()
	{
		return View::make('main');	
	}

    public function edit()
    {
        return View::make('user.edit');  
    }

    public function createUser()
    {
        return View::make('user.create');
    }

    public function userStore()
    {
        $validator = Validator::make(Input::all(), User::$rules);

        if ($validator->fails()) {
        
            Session::flash('errorMessage', 'User could not be created!!');
            return Redirect::back()->withInput()->withErrors($validator);
        } else {

        $user = new User;    
        $user->first_name=Input::get('first_name');
        $user->last_name=Input::get('last_name');
        $user->phone_number=Input::get('phone_number');
        $user->email=Input::get('email');
        $user->address=Input::get('address');
        $user->city=Input::get('city');
        $user->zip_code=Input::get('zip_code');
        $user->password=Input::get('password');
        $user->role_id=User::STANDARD;
        $user->save();

        return Redirect::action('UsersController@loginpage');
        }
    }
}