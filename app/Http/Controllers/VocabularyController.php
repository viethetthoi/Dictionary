<?php

namespace App\Http\Controllers;

use App\Models\Vocabularys;
use App\Models\Topics;
use Illuminate\Http\Request;

class VocabularyController extends Controller
{

   
    function showDetailVocaOfTopic(Request $request, $id){
        $id_topic = $id;
        $vocabularys = Vocabularys::where('id_topic', $id_topic)->get();
        $topic = Topics::find($id_topic);
        $topicName = $topic ? $topic->name_topic : 'Chủ đề không tồn tại';
        return view('admin.detailVocaPage', compact('vocabularys', 'topicName', 'id_topic'));
    }

    function addVocaTopicPage(Request $request){
        $topics = Topics::pluck('name_topic', 'id')->toArray();
        return view('admin.addVocaPage', compact('topics'));
    }

    function addVocaTopic(Request $request){
        $request->validate([
                'name_voca' => 'required',
                'transcribe_phonetically' => 'required',
                'image_voca' => 'required',
                'meaning' => 'required',
                'example' => 'required',
                'id_topic' => 'required|not_in:0',      
            ],
            [
                'required' => ':attribute không được để trống',
                'id_topic.required' => 'Vui lòng chọn một đề tài.',
                'id_topic.not_in' => 'Vui lòng chọn một đề tài hợp lệ.',
            ],
            [
                'name_voca' => 'Tên',
                'transcribe_phonetically' => 'Phiên âm',
                'image_voca' => 'Ảnh',
                'meaning' => 'Nghĩa',
                'example' => 'Ví dụ',
            ]
        );

        $input = $request->all();
        if ($request->hasFile('image_voca')) {
            $file = $request->file('image_voca');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('img'), $fileName);
            $thumbnail = 'public/img/' . $fileName;
            $input['image_voca'] = $thumbnail;
        }    
        try {
            Vocabularys::create($input);
        } catch (\Exception $e) {
            // Xử lý lỗi nếu có
            return response()->json(['error' => $e->getMessage()], 500);
        }
        return redirect()->route('listVocaOfTopic', ['id' => $input['id_topic']])->with('status', 'Đã thêm từ vựng '.$input['name_voca'].' thành công');
    }

    function deleteVoca(Request $request) {
        $id_voca = $request->input('delete_voca');
        $voca = Vocabularys::find($id_voca); 
        if ($voca) {
            $id_topic = $voca->id_topic;
            $imagePath = public_path('img/' . basename($voca->image_voca)); 
            if (file_exists($imagePath)) {
                unlink($imagePath); 
            }
            $voca->delete();
            return redirect()->route('listVocaOfTopic', ['id' => $id_topic])->with('status', 'Đã xóa thành công');
        } 
    }
    

    function getVocaToEdit(Request $request ,$id){
        $id_voca = $id;
        $vocabulary = Vocabularys::find($id_voca);
        $topics = Topics::pluck('name_topic', 'id')->toArray();
        return view('admin.editVocaPage', compact('vocabulary', 'topics', 'id_voca'));
    }

    function editVoca(Request $request){
        $request->validate([
                'name_voca' => 'required',
                'transcribe_phonetically' => 'required',
               
                'meaning' => 'required',
                'example' => 'required',
                'id_topic' => 'required|not_in:0',
                
            ],
            [
                'required' => ':attribute không được để trống',
                'id_topic.required' => 'Vui lòng chọn một đề tài.',
                'id_topic.not_in' => 'Vui lòng chọn một đề tài hợp lệ.',
            ],
            [
                'name_voca' => 'Tên',
                'transcribe_phonetically' => 'Phiên âm',
            
                'meaning' => 'Nghĩa',
                'example' => 'Ví dụ',
            ]
        );

        $input = $request->all();
        $id_vocabu = $request->input('id_voca');
        if ($request->hasFile('image_voca')) {
            $file = $request->file('image_voca');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('img'), $fileName);
            $thumbnail = 'public/img/' . $fileName;
            $input['image_voca'] = $thumbnail;
        }   
        $vocabulary = Vocabularys::find($id_vocabu);
        if ($vocabulary) {
            $vocabulary->update($input); 
        }
        return redirect()->route('listVocaOfTopic', ['id' => $input['id_topic']])->with('status', 'Từ vựng có ID = '.$id_vocabu.' đã sửa thành công');
    }
}
 
