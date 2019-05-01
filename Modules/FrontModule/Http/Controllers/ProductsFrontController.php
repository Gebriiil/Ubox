<?php

namespace Modules\FrontModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\CartModule\Repository\CartRepository;
use Modules\ProductModule\Repository\OfferRepositry;
use Modules\ProductModule\Repository\ProductCategoryRepository;
use Modules\ProductModule\Repository\ProductPhotoRepository;
use Modules\ProductModule\Repository\ProductRepository;

class ProductsFrontController extends Controller {
	private $productRepo, $categoryRepo, $productPicRepo, $OfferRepo, $cartRepo;

	public function __construct(
		ProductRepository $productRepo,
		ProductCategoryRepository $categoryRepo,
		OfferRepositry $OfferRepo,
		ProductPhotoRepository $productPicRepo,
		CartRepository $cartRepo
	) {
		$this->productRepo = $productRepo;
		$this->categoryRepo = $categoryRepo;
		$this->OfferRepo = $OfferRepo;
		$this->productPicRepo = $productPicRepo;
		$this->cartRepo = $cartRepo;
	}

	public function category($id) {

		$category = $this->categoryRepo->find($id);
		$categories = $this->categoryRepo->findAll();
		$page_name = '';

		$topRatedProduct = $this->categoryRepo->topRatedProduct($id);

		return view('frontmodule::pages.category', compact('category', 'categories', 'page_name', 'topRatedProduct'));

	}
	public function product($id) {
		$categories = $this->categoryRepo->findAll();
		$product = $this->productRepo->find($id);
		$productInCart = $this->cartRepo->findByProductId($id)->first();
		$page_name = '';

		$PickedForYou = $this->categoryRepo->pickedForYou($product->id);

		return view('frontmodule::pages.product', compact('categories', 'product', 'productInCart', 'page_name', 'PickedForYou'));
	}
	public function insert_review(Request $request) {
		$data = $request->all();
		$review = $this->productRepo->insertReview($data);
		$page_name = '';
		return back()->with('success', trans('frontmodule::front.your_review_added'));
	}

	public function product_search() {
		$products = $this->productRepo->findWhereLike(request('search'));
		$page_name = '';

		return view('frontmodule::pages.product_search', compact('products', 'page_name'));
	}

}
