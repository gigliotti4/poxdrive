<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($categorias as $categoria)
    <url>
        <loc>{{ url('/subcategorias/' . $categoria->id) }}</loc>
        <lastmod>{{ $categoria->updated_at ? $categoria->updated_at->toAtomString() : now()->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>
    @endforeach
</urlset>
