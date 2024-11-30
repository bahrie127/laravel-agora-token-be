<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TaylanUnutmaz\AgoraTokenBuilder\RtcTokenBuilder;

class AgoraTokenController extends Controller
{

    //generate agora token
    public function generate(Request $request)
    {
        $appId = "19034d23a1564497beb01a5b1e84c50f";
        $appCertificate = "db9dbf5eac9f49c0b6b4104202fed082";
        $channelName = $request->query('channel');
        $uid = rand(1, 23000);
        $expirationTimeInSeconds = 86400;
        $currentTimeStamp = time();
        $privilegeExpiredTs = $currentTimeStamp + $expirationTimeInSeconds;

        $token = RtcTokenBuilder::buildTokenWithUid($appId, $appCertificate, $channelName, $uid, RtcTokenBuilder::RolePublisher, $privilegeExpiredTs);

        return response()->json(['token' => $token, 'uid' => $uid]);
    }
}
