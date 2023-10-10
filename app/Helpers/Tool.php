<?php

namespace App\Helpers;

use App\Models\Link;
use App\Models\User;
use App\Models\FileLink;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use stdClass;
use Throwable;

class Tool
{
    public function hello()
    {
        echo "Hello world";
    }

    /**
     * generate random integer code
     *
     * @return $code
     */
    public function generateCode()
    {
        $code = random_int(1000000000,9999999999);
        return $code;
    }

    /**
     * generate random string
     *
     * @param $length
     * @return $token
     */
    public function generateToken($length)
    {
        $token = Str::random($length);
        return $token;
    }

    /**
     * create a link and save it in the link table
     *
     * @param $userId
     * @return $data
     */
    public function createLink($userId)
    {
        try {
            $code = $this->generateCode();
            $token = $this->generateToken(60);
            $link = route('link.verify',[$code,$token]);
            $create = Link::create([
                'user_id' => $userId,
                'token' => $token,
                'signature' => $code,
                'link' => $link,
                'expired_at' => Carbon::now()->addHours(24)
            ]);
            if ($create) {
                $data = new stdClass();
                $data->message = 'Link Created';
                $data->status = true;
                $data->link = $link;
                return $data;
            } else {
                return false;
            }
        } catch (\Throwable $th) {
            Log::info($th->getMessage());
        }
    }

    /**
     * check signature and token in the link table
     * update status in the link table
     * update email_verified_at in the user table
     *
     * @param $signature, $token
     * @return $data
     */
    public function emailVerify($signature, $token)
    {
        try {
            $data = new stdClass();
            $link = Link::where('signature',$signature)
                ->where('token',$token)
                ->where('status',0)
                ->first();
            if (!is_null($link)) {
                $dateTimeNow = Carbon::now();
                $dateExpired = Carbon::parse($link->expired_at);
                if ($dateTimeNow < $dateExpired) {
                    $user = User::find($link->user_id);
                    // update status link
                    $link->status = 1;
                    $link->save();
                    // update user data
                    $user->email_verified_at = Carbon::now();
                    $user->save();
                    // response
                    $data->status = true;
                    $data->message = 'Verifikasi telah berhasil dilakukan';
                    return $data;
                } else {
                    $data->status = false;
                    $data->message = 'Link sudah tidak berlaku';
                    return $data;
                }
            } else {
                $data->status = false;
                $data->message = 'Not found';
                return $data;
            }
        } catch (Throwable $th) {
            Log::info($th->getMessage());
        }

    }

    /**
     * verifiy access file
     *
     *
     */

    /**
     * create file link and save in to file link table
     *
     * @param $userId
     * @return $data
     */
    public function createFileLink($userId, $password=NULL, $fileId)
    {
        try {
            $code =  $this->generateCode();
            $token = $this->generateToken(60);
            $key = $this->generateToken(60);
            $link = route('file.access-verify',[$code,$token]);
            $create = FileLink::create([
                'user_id' => $userId,
                'token' => $token,
                'signature' => $code,
                'url' => $link,
                'status' => 1,
                'key' => $key,
                'password' => $password,
                'file_id' => $fileId
            ]);
            if ($create) {
                $data = new stdClass();
                $data->message = 'Link Created';
                $data->status = true;
                $data->link = $link;
                return $data;
            } else {
                return false;
            }

        } catch(\Throwable $th) {
            Log::info($th->getMessage());
        }
    }

}
