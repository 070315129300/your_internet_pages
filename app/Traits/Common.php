<?php
namespace App\Traits;

use App\Mail\AccountVerificationOPT;
use App\Mail\EmailOPT;
use App\Models\UserOtp;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

trait Common
{

    public function formatDate($date, $oldFormat, $newFormat)
    {
        return Carbon::createFromFormat($oldFormat, $date)->format($newFormat);
    }

    //Generate 4 digits random number to verify user's email address
    public function generateFourDigitsOTP()
    {
        $four_digit_random_number = random_int(1000, 9999);
        return $four_digit_random_number;
    }

    public function sendMessage($phone_number, $message)
    {

        $curl = curl_init();

        curl_setopt_array(
            $curl, array(
                CURLOPT_URL => 'https://channels.ogaranya.com/api/notification',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => '{
                "messages":[
                    {
                "msisdn": "' . $phone_number . '",
                "message" : "' . $message . '",
                "device_id" : "2347031512930"
                    }
                    ]
                  }',
                CURLOPT_HTTPHEADER => array(
                    'Accept: application/json',
                    'Content-Type: application/json',
                ),
            )
        );

        $response = curl_exec($curl);

        curl_close($curl);

        return json_decode($response, true);

    }

    public function sendOTPViaPhone($phone_number)
    {

        $otp = $this->generateFourDigitsOTP();

        $user = UserOtp::where('phone_number', $phone_number)->first();

        if ($user) {
            $user->otp = $otp;
            $user->status = 'unverified';
            $user->save();
        } else {
            $userOtp = new UserOtp();
            $userOtp->phone_number = $phone_number;
            $userOtp->otp = $otp;
            $userOtp->status = 'unverified';
            $userOtp->save();
        }

        $message = 'Please use the otp: ' . $otp . ' to complete your registration on schoolpal.';

        $this->sendMessage($phone_number, $message);
    }

    public function sendOTPViaEmail($email)
    {

        $otp = $this->generateFourDigitsOTP();

        $user = UserOtp::where('email', $email)->first();

        if ($user) {
            $user->otp = $otp;
            $user->status = 'unverified';
            $user->save();
        } else {
            $userOtp = new UserOtp();
            $userOtp->email = $email;
            $userOtp->otp = $otp;
            $userOtp->status = 'unverified';
            $userOtp->save();
        }

        Mail::to($email)->send(new AccountVerificationOPT($otp, $email));
    }

}
