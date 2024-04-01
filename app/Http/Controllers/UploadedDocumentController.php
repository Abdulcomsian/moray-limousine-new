<?php

namespace App\Http\Controllers;

use App\UploadedDocument;
use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\MorayLimousineNotifications;

class UploadedDocumentController extends Controller
{
    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function approveDocument($id)
    {
        $document = UploadedDocument::find($id);
        $user = User::find($document->user_id);
        $document->document_status = 'approved';
        $document->save();
        $registered_msg = $this->notifyApproveDocumentMsg;
        $user->notify(new MorayLimousineNotifications($registered_msg));
        return redirect()->back()->with('success', 'Success.. !  Document is Approved Successfully');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function disapproveDocument($id)
    {
        $document = UploadedDocument::find($id);
        $user = User::find($document->user_id);
        $document->document_status = 'disapproved';
        $document->save();
        $registered_msg = $this->notifyDisApproveDocumentMsg;
        $user->notify(new MorayLimousineNotifications($registered_msg));
        return redirect()->back()->with('success', 'Success.. !  Document is DisApproved Successfully');
    }

    protected $notifyApproveDocumentMsg = [
        'greeting' => 'Your Document is Approved',
        'subject' => 'Your Document is Approved',
        'body'   => 'Your Uploaded Document is Approved on Hathaway Limousines For More Details visit web',
        'thanks_text' => 'Thanks For Using Hathaway Limousines',
        'action_text' => 'View My Site',
        'action_url' => '/admin/index'
    ];
    protected $notifyDisApproveDocumentMsg = [
        'greeting' => 'Your Document is DisApproved',
        'subject' => 'Your Document is DisApproved',
        'body'   => 'Your Uploaded Document is DisApproved on Hathaway Limousines For More Details visit web',
        'thanks_text' => 'Thanks For Using Hathaway Limousines',
        'action_text' => 'View My Site',
        'action_url' => '/admin/index'
    ];
}
