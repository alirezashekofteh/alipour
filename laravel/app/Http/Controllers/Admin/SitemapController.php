<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Saham;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\post;
use App\Models\Tahlilsahme;
use App\Models\Term;
use DB;
use URL;
use App;

class SitemapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public  function index()
    {

            // create sitemap index
            $sitemap = App::make ("sitemap");
            // add sitemaps (loc, lastmod (optional))
            $sitemap->addSitemap(URL::to('sitemaps/2021-sitemap-posts.xml'));
            $sitemap->addSitemap(URL::to('sitemaps/2022-sitemap-posts.xml'));
            $sitemap->addSitemap($this->terms());
            $sitemap->addSitemap($this->categorypost());
            $sitemap->addSitemap($this->categorysaham());
            $sitemap->addSitemap($this->sahams());
            $sitemap->addSitemap($this->tahlilsahams());
            // create file sitemap.xml in your public folder (format, filename)
            $sitemap->store('sitemapindex','sitemap');
    }
    public function posts(post $post)
    {
        $posts=post::whereYear('created_at',$post->created_at->year)->orderBy('updated_at','DESC')->get();

            // create sitemap
            $sitemap_posts = App::make("sitemap");
            foreach ($posts as $post)
            {
                $sitemap_posts->add(route('singleblog',$post->slug), $post->updated_at,1.2 - substr_count(route('singleblog',$post->slug), '/') / 10, 'always');
            }

            // create file sitemap-posts.xml in your public folder (format, filename)
            $sitemap_posts->store('xml','sitemaps/'.$post->created_at->year.'-sitemap-posts');
    }
    public function terms()
    {
        $terms=Term::all();

            // create sitemap
            $sitemap_terms = App::make("sitemap");
            foreach ($terms as $term)
            {
                $sitemap_terms->add(route('termtak',$term->slug), $term->updated_at,1.2 - substr_count(route('termtak',$term->slug), '/') / 10, 'always');
            }

            // create file sitemap-posts.xml in your public folder (format, filename)
            $sitemap_terms->store('xml','sitemaps/sitemap-terms');
            return URL::to('sitemaps/sitemap-terms.xml');
    }
    public function categorypost()
    {
        $categorys=Category::whereType('post')->orderBy('updated_at','DESC')->get();

            // create sitemap
            $sitemap_category = App::make("sitemap");
            foreach ($categorys as $category)
            {
                $sitemap_category->add(route('catblog',$category->slug), $category->updated_at,1.2 - substr_count(route('catblog',$category->slug), '/') / 10, 'always');
            }

            // create file sitemap-posts.xml in your public folder (format, filename)
            $sitemap_category->store('xml','sitemaps/sitemap-category-post');
            return URL::to('sitemaps/sitemap-category-post.xml');
    }
    public function categorysaham()
    {
        $categorys=Category::whereType('saham')->orderBy('updated_at','DESC')->get();

            // create sitemap
            $sitemap_category = App::make("sitemap");
            foreach ($categorys as $category)
            {
                $sitemap_category->add(route('catsaham',$category->slug), $category->updated_at,1.2 - substr_count(route('catsaham',$category->slug), '/') / 10, 'always');
            }

            // create file sitemap-posts.xml in your public folder (format, filename)
            $sitemap_category->store('xml','sitemaps/sitemap-category-saham');
            return URL::to('sitemaps/sitemap-category-saham.xml');
    }
    public function sahams()
    {
        $sahams=Saham::whereActive('1')->orderBy('updated_at','DESC')->get();

            // create sitemap
            $sitemap = App::make("sitemap");
            foreach ($sahams as $item)
            {
                $sitemap->add(route('sahms',$item->slug), $item->updated_at,1.2 - substr_count(route('sahms',$item->slug), '/') / 10, 'always');
            }

            // create file sitemap-posts.xml in your public folder (format, filename)
            $sitemap->store('xml','sitemaps/sitemap-sahams');
            return URL::to('sitemaps/sitemap-sahams.xml');
    }
    public function tahlilsahams()
    {
        $sahams=Tahlilsahme::whereActive('1')->orderBy('updated_at','DESC')->get();

            // create sitemap
            $sitemap = App::make("sitemap");
            foreach ($sahams as $item)
            {
                $sitemap->add(route('tahlil',$item->slug), $item->updated_at,1.2 - substr_count(route('tahlil',$item->slug), '/') / 10, 'always');
            }

            // create file sitemap-posts.xml in your public folder (format, filename)
            $sitemap->store('xml','sitemaps/sitemap-tahlil');
            return URL::to('sitemaps/sitemap-tahlil.xml');
    }


}