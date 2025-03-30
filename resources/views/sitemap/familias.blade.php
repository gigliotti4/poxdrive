<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($familias as $familia)
    <url>
        <loc>{{ url('/items/' . $familia->id) }}</loc>
        <lastmod>{{ $familia->updated_at ? $familia->updated_at->toAtomString() : now()->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>
    @endforeach
</urlset>
