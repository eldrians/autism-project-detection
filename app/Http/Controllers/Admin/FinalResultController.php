<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataUser;
use App\Models\FinalResult;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class FinalResultController extends Controller
{

    public function index(): View
    {
      $final = DB::table('finalresult')->join('data_users', 'finalresult.id_user', '=', 'data_users.id')->get();
      return view('admin.final.index', compact('final'));
    }


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

    private function getFinalPoints($id){
      $total = 0;
      $results = Result::where('user_id', '=', $id)->get();
      foreach ($results as $result) {
        $total += $result->total_points;
      }
      return $total;
    }

    public function store(Request $request, $id)
    {
      $total_results = $this->getFinalPoints($id);
      $hasil_total_results = "";
      if ($total_results <= (1012/3)) {
        $hasil_total_results = "Ringan";
      } else if ($total_results > (1012/3) && $total_results <= ((1012*2)/3)) {
          $hasil_total_results = "Sedang";
      } else if($total_results > ((1012*2)/3)){
          $hasil_total_results = "Berat";
      }

      $result = FinalResult::create([
        'id_user' => $id,
        'final_points' => $this->getFinalPoints($id),
        'hasil_survei' => $hasil_total_results,
        'rekomendasi' => $request->rekomendasi,
      ]);

      return redirect("/");
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
    public function destroy(FinalResult $final): RedirectResponse
    {
        $final->delete();

        return back()->with([
            'message' => 'successfully deleted !',
            'alert-type' => 'danger'
        ]);
    }
}
