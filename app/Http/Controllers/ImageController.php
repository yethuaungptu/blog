<?php

namespace App\Http\Controllers;
use App\Images;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('image/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('image/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = Images::create($this->validateRequest());
        $this->storeImage($image);
        $this->storeGallery($image,$request);
        $image->save();
        return redirect('images')->with('message','Post are successfully created...');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function validateRequest(){
        return request()->validate([
            'title'=>'required|min:3',
            'content'=>'required|min:3',
            'image' => 'sometimes|file|image|max:5000',
            'image1' => 'sometimes|file|image|max:5000',
            'image2' => 'sometimes|file|image|max:5000',
            'image3' => 'sometimes|file|image|max:5000',
            'image4' => 'sometimes|file|image|max:5000',
            'image5' => 'sometimes|file|image|max:5000',
            'gallery.*' => 'sometimes|file|image|max:20000',
        ]);
    }
    private function storeImage($image)
    {
        if (request()->has('image')){
            $image->update([
                'image' => request()->image->store('uploads', 'public')
            ]);
            $this->saveI($image);
        }
        if (request()->has('image1')){
            $image->update([
                'image1' => request()->image1->store('uploads', 'public')
            ]);
            $this->saveI($image);
        }
        if (request()->has('image2')){
            $image->update([
                'image2' => request()->image2->store('uploads', 'public')
            ]);
            $this->saveI($image);
        }
        if (request()->has('image3')){
            $image->update([
                'image3' => request()->image3->store('uploads', 'public')
            ]);
            $this->saveI($image);
        }
        if (request()->has('image4')){
            $image->update([
                'image4' => request()->image4->store('uploads', 'public')
            ]);
            $this->saveI($image);
        }
        if (request()->has('image5')){
            $image->update([
                'image5' => request()->image5->store('uploads', 'public')
            ]);
            $this->saveI($image);
        }


    }

    private function storeGallery($image,$request){
        $gallery = array();
        if ($files = $request->file('gallery')){
            foreach ($files as $file){
                $name = Str::random().'.'.$file->getClientOriginalExtension();
                $destinationPath = public_path('/uploads');
                if($file->move($destinationPath, $name)) {
                    $gallery[]= $name;

                }
            }
            $image->update([
                'gallery' => $gallery
            ]);

        }
    }

    private function saveI($image){
        $image = Image::make(public_path('storage/' . $image->image))->fit(270,300);
        $image -> save();
    }
}
