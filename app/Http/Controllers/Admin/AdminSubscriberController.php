<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminSubscriberController extends Controller
{
    public function index()
    {
        $data['subscribers'] = Subscriber::get();
        return view('backend.subscriber.subscribers', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|unique:subscribers',
        ]);

        $data = new Subscriber();

        $data->email = $request->email;
        $data->status = 'Active';
        $data->token = '';
        $data->save();

        $notification = array(
            'message' => 'Data Saved Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
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

        $request->validate([
            'email' => [
                'required',
                Rule::unique('subscribers')->ignore($id)
            ],
        ]);

        $data =  Subscriber::find($id);

        $data->email = $request->email;
        $data->status = $request->status;
        $data->token = '';

        $data->update();

        $notification = array(
            'message' => 'Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    // status update
    public function StatusUpdate(Request $request, $id)
    {
        $data =  Subscriber::find($id);

        if ($request->status == 'on') {
            $data->status = 'Active';
        } else {
            $data->status = 'Deactive';
        }

        $data->token = '';
        $data->update();

        $notification = array(
            'message' => 'Status Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Subscriber::find($id);
        $data->delete();

        $notification = array(
            'message' => 'Data Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
