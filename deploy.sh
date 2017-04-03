cp -r application deploy
cp -r layout deploy
cp index.php deploy
cp .htaccess deploy
cp src/fly/flightplan.js deploy
cp src/database.php deploy/application/config
cp src/config.php deploy/application/config
cp src/fly/.gitignore deploy

cd deploy
git add --a
git commit -m "fly"
fly production
