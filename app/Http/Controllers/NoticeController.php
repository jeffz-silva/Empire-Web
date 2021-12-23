<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notice;

class NoticeController extends Controller
{
    public function Index(int $Id){
        $Notice = $this->getNoticeById($Id);
        if(empty($Notice))
            return redirect()->route('web.app.home');

        return view('app.notice', ['Notice' => $Notice, 'Notices' => $this->getNewNotices()]);
    }

    public function IndexList(string $Article){
        if($Article != "all")
            $Notices = $this->getNoticesByType($Article);
        else
            $Notices = $this->getNewNotices(10);

        return view('app.article', ['Notices' => $Notices, 'Article' => $Article]);
    }

    public function getNewNotices($Count = 5){
        return Notice::orderBy('created_at', 'DESC')->take($Count)->get();
    }

    public function getNoticesByType(string $Type){
        return Notice::Where('type', '=', $Type)->get();
    }
    
    public function getNoticeById(int $id){
        return Notice::Find($id);
    }
}
