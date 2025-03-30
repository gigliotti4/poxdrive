<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($subcategorias as $subcategoria)
    <url>
        <loc>{{ url('/productos/' . $subcategoria->id) }}</loc>
        <lastmod>{{ $subcategoria->updated_at ? $subcategoria->updated_at->toAtomString() : now()->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>
    @endforeach
</urlset>
