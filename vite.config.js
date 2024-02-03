import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],

    build: {
        // カスタムのビルド設定を追加
        outDir: 'public/build', // 出力先ディレクトリ
        assetsDir: '', // アセットのディレクトリ
        manifest: true, // manifest.json ファイルを生成
        // 他のオプション...
    },
});
