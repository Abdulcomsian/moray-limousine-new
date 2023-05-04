<?php

namespace App\Http\Controllers;

use App\Models\CmsFaq;
use App\Models\CmsHomePage;
use App\Models\CmsService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CMSController extends Controller
{
    private $service;
    public function __construct(CmsService $service)
    {
        $this->service = $service;
    }

    /**
     * @return Factory|View
     */
    public function servicesList(){
        $services = CmsService::all();
        return view('admin.pages-cms.services-list')->with('services',$services);
    }

    /**
     * @return Factory|View
     */
      public function addServices(){
          return view('admin.pages-cms.add-services');
      }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
      public function storeServices(Request $request)
      {
          if ($request->hasFile('service_image')) 
          {
              $service_image = time() . $request->service_image->getClientOriginalName();
              $request->service_image->move(public_path('files/services-images'), $service_image);
          }
          $form_data = $request->all();
          $form_data['service_image'] = $service_image;
          $service = $this->service->saveService($form_data);
          if ($service){
              return redirect(route('service.list'))->with('success','Service Is Saved Successfully ..');
          }else{
              return redirect(route('service.list'))->with('success','Oops ... ! Service is not Saved "Some this went Wrong.."');
          }
      }

    /**
     * @param $id
     * @return Factory|View
     */
      public function editService($id){
          $service = $this->service->find($id);
          return view('admin.pages-cms.edit-service')->with('service',$service);
      }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
      public function updateService(Request $request)
      {
          $form_data = $request->except('_token','edit_id');
          if ($request->hasFile('service_image')) 
          {
              $service_image = time() . $request->service_image->getClientOriginalName();
              $request->service_image->move(public_path('files/services-images'), $service_image);
              $form_data['service_image'] = $service_image;
          }
         
          $id = $request['edit_id'];
          $this->service->updateService($form_data,$id);
              return redirect(route('service.list'))->with('success','Service Updated Successfully ..');
      }

    /**
     * @param $id
     * @return RedirectResponse
     */
      public function deleteService($id){
          $service = $this->service->find($id);
          $service->delete();
          return redirect(route('service.list'))->with('success','Service Deleted Successfully ..');
      }




    /**
     * @return Factory|View
     */
      public function faqsList(){
          $faqs = CmsFaq::all();
          return view('admin.pages-cms.faq-list')->with('faqs',$faqs);
      }
    /**
     * @return Factory|View
     */
      public function addFaqs(){
          return view('admin.pages-cms.add-faq');
      }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
      public function storeFaq(Request $request){
          CmsFaq::create($request->all());
          return redirect(route('faq.list'))->with('success','New Faq Created Successfully ... ');
      }

    /**
     * @param $id
     * @return Factory|View
     */
      public function editFaq($id){
          $faq = CmsFaq::find($id);
          return view('admin.pages-cms.edit-faq')->with('faq',$faq);
      }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function updateFaq(Request $request){
          $id = $request['edit_id'];
          $form_data = $request->except('edit_id','_token');
           CmsFaq::where('id',$id)->update($form_data);
        return redirect(route('faq.list'))->with('success','FAQ Is Updated Successfully ...');
    }

    public function deleteFaq($id){
        $faq = CmsFaq::find($id);
        $faq->delete();
        return redirect(route('faq.list'))->with('success','FAQ Is Deleted Successfully ...');
    }

    /**
     * @return Factory|View
     */
    public function manageHomePage(){
        $cmsHomePage = CmsHomePage::all();
        return view('admin.manage-design.manage-home-page', compact('cmsHomePage'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function updateHomePageCMS(Request $request){
        $data = $request->except('_token');

        foreach ($data as $key => $value){
            if ($request->hasFile($key)){
                $this->uploadImage($key, $request->file($key));
                echo $key . ': ' . 'Image Hai' . '<br>';
            }else{
                $object = CmsHomePage::where('item_name', $key)->first();
                if ($object == null){
                    CmsHomePage::create([
                        'item_name' => $key,
                        'item_content' => $value
                    ]);
                    echo $key . ': ' . $value . '<br>';
                }else{
                    CmsHomePage::where('item_name', $key)->update([
                        'item_name' => $key,
                        'item_content' => $value
                    ]);
                }
            }
        }
        return redirect()->back();
    }

    /**
     * @param $value
     * @return bool
     */
    private function isImage($value){
        $isImage = false;
        if (str_contains($value, 'image')){
            $isImage = true;
        }
        if (str_contains($value, 'text')){
            $isImage = false;
        }

        return $isImage;
    }

    /**
     * @param $key
     * @param $image
     */
    private function uploadImage($key, $image){
        $dir = 'images/cms/home/';
        $filename = mt_rand() . time() . '.' . $image->getClientOriginalExtension();
        $image->move( public_path($dir), $filename);

        $object = CmsHomePage::where('item_name', $key)->first();
        if ($object == null)
        {
            CmsHomePage::create([
                'item_name' => $key,
                'item_content' => $dir . $filename
            ]);
        }else{
            CmsHomePage::where('item_name', $key)->update([
                'item_name' => $key,
                'item_content' => $dir . $filename
            ]);
        }
    }
}
