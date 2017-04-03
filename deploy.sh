cp -r application deploy
cp src/database.php deploy/application/config/
cp -r layout deploy
cp -r anexos deploy
cp -r planos deploy
cp -r system deploy
cp index.php deploy
cp .htaccess deploy
cp src/fly/flightplan.js deploy
cp src/fly/.gitignore deploy

cd deploy
git add --a
git commit -m "fly"
fly production
