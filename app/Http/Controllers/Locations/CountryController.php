<?php

namespace App\Http\Controllers;


use App\Entities\Locations\CountryEntity;
use App\Repositories\Locations\CountryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class CountryController extends Controller
{
    /** @var CountryRepository */
    protected $repo;

    public function __construct()
    {
        $this->repo = app(CountryRepository::class);
    }

    public function index(Request $request)
    {

        /** @var Collection $items */
        $items = $this->repo->all();

        return view('administrator.countries.index', [
            'items' => $items,
            'title' => 'Страны'
        ]);
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function save(Request $request)
    {
        $id = $request->get('id', null);

        $this->validate($request, [
            'title'          => 'required|string|max:255' . ($id ? '' : '|unique:countries'),
            'slug'           => 'required|string|max:255' . ($id ? '' : '|unique:countries'),
            'description'    => 'required|string|max:1000',
            'image'          => ($id ? '' : 'required'),
            'image_shadowed' => ($id ? '' : 'required'),
        ]);

        $entity = $id ? $this->repo->find($id) : new CountryEntity();

        $entity->setTitle($request->get('title'));
        $entity->setSlug($request->get('slug'));
        $entity->setDescription($request->get('description'));
        if ($request->hasFile('image')) {
            $entity->setImage($request->file('image'));
        }
        if ($request->hasFile('image_shadowed')) {
            $entity->setImageShadowed($request->file('image_shadowed'));
        }

        try {
            $this->repo->save($entity);

            session()->flash('message', 'Страна успешно сохранена');

            return redirect(route('admin::countries::index'));
        } catch (\Exception $error) {
            return back()->withErrors($error->getMessage())->withInput();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrator.countries.edit');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Request $request)
    {
        $item = $this->repo->find($request->route('id'));

        $title = $item->getTitle();

        return view('administrator.countries.edit', compact('item', 'title'));
    }
}
