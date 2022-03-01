<?php

namespace App\Http\Controllers\Admin;

use App\Attribute;
use App\Http\Controllers\Controller;
use App\Product;
use App\Vila;
use Illuminate\Http\Request;

class VilaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:show_vila')->only(['index']);
        $this->middleware('can:update_vila')->only(['edit' , 'update']);

    }

    public function index()
    {
        $vila = Vila::find(1);

        return view('panel.villa.index', compact('vila'));
    }

    public function edit()
    {
        return view('panel.villa.edit' , ['vila' => Vila::find(1)]);
    }

    public function update(Request $request)
    {

        $data = $request->validate([
            'title' => ['required'],
            'short_descrip' => ['required'],
            'descrip' => ['required'],
            'price' => ['required'],
            'price2' => ['required'],
            'video' => ['required'],
            'qty' => ['required'],
            'attributes.*.value' => ['required'],
            'attributes.*.name' => ['required'],
        ]);

        $vila = Vila::find(1);
        $vila->update($data);

        if (isset($data['attributes'])) {
            $vila->attributes()->detach();
            $this->AttachAttributProduct($data['attributes'], $vila);
        }
        toastr()->success('تغییرات با موفقیت اعمال شدند');
        return back();
    }
    protected function AttachAttributProduct($attributes1, Vila $vila): void
    {
        $attributes = collect($attributes1);

        $attributes->each(function ($item) use ($vila) {
            if (is_null($item['name']) and is_null($item['value'])) return;
            $attr = Attribute::firstorcreate([
                'name' => $item['name'],
            ]);

            $attr_value = $attr->values()->firstOrCreate([
                'value' => $item['value'],
            ]);

            $vila->attributes()->attach($attr->id, ['value_id' => $attr_value->id]);

        });
    }
}
