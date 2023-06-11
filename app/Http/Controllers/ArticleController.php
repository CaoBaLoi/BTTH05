<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Category;
class ArticleController extends Controller
{
    public function index()
    {
        $baiviets = DB::table('baiviet')
            ->select('ma_bviet', 'tieude', 'ten_bhat', 'theloai.ten_tloai', 'tomtat', 'noidung', 'tacgia.ten_tgia', 'ngayviet', 'hinhanh')
            ->join('theloai', 'baiviet.ma_tloai', '=', 'theloai.ma_tloai')
            ->join('tacgia', 'baiviet.ma_tgia', '=', 'tacgia.ma_tgia')
            ->get();
        $authors = Author::all();
        $categories = Category::all();
        return view('vw_Music.index', compact('baiviets', 'authors', 'categories'));
    }


    public function create(){
        $authors = Author::all();
        $categories = Category::all();
        return view('vw_Music.create', compact('authors', 'categories'));
    }

    public function store(Request $request) {
        $baiviets = new Article();
        $tieude = $request['tieude'];
        $ten_bhat = $request['ten_bhat'];
        $ma_tloai = $request['ma_tloai'];
        $tomtat = $request['tomtat'];
        $noidung = $request['noidung'];
        $ma_tgia = $request['ma_tgia'];
        $ngayviet = date("Y-m-d H:i:s",strtotime($request['ngayviet']));
        if($baiviets){
            $baiviets->tieude = $tieude;
            $baiviets->ten_bhat = $ten_bhat;
            $baiviets->ma_tloai = $ma_tloai;
            $baiviets->tomtat = $tomtat;
            $baiviets->noidung = $noidung;
            $baiviets->ma_tgia = $ma_tgia;
            $baiviets->ngayviet = $ngayviet;
            $baiviets->hinhanh = $request->hinhanh;
            $baiviets->save();
            return redirect('baiviet')->with('success', "Music created successfully");
        }
        else{
            return redirect('baiviet')->with('fail', "Music created fail");
        }

    }
    public function update(Request $request,$ma_bviet)
    {
        
        $baiviets = Article::find($ma_bviet);

        $tieude = $request['tieude'];
        $ten_bhat = $request['ten_bhat'];
        $ma_tloai = $request['ma_tloai'];
        $tomtat = $request['tomtat'];
        $noidung = $request['noidung'];
        $ma_tgia = $request['ma_tgia'];
        $ngayviet = date("Y-m-d H:i:s",strtotime($request['ngayviet']));
        if($baiviets){
            $baiviets->tieude = $tieude;
            $baiviets->ten_bhat = $ten_bhat;
            $baiviets->ma_tloai = $ma_tloai;
            $baiviets->tomtat = $tomtat;
            $baiviets->noidung = $noidung;
            $baiviets->ma_tgia = $ma_tgia;
            $baiviets->ngayviet = $ngayviet;
            $baiviets->hinhanh = $request->hinhanh;
            $baiviets->update();
            return redirect('baiviet')->with('success', "Music updated successfully");
        }
        else{
            return redirect('baiviet')->with('fail', "Music updated fail");
        }
       
    }
    public function destroy($ma_bviet)
    {
        $baiviets = Article::find($ma_bviet);
        $baiviets->delete();
        return redirect('baiviet')->with('success', "Music deleted successfully");
    }
    
}
