# MCPayment Dev Test

## Setup
- Clone or download as zip
- Rename `.env.example` to `.env`
- Setup database to `sqlite` driver as following:
```
DB_CONNECTION=sqlite
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=
# DB_USERNAME=
# DB_PASSWORD=
```
- Run `php artisan key:generate && php artisan migrate`

## Extension
If you are using Visual Studio Code, then install the following extension:
- [Rest Client](https://marketplace.visualstudio.com/items?itemName=humao.rest-client)
- [SQLite Viewer](https://marketplace.visualstudio.com/items?itemName=qwtel.sqlite-viewer)


## Usage
### Two Sums
- Input the Target number
- Input the other numbers to be sum, split with comma `,`
- The array numbers inputed cannot over the Target number

Recommended option:

Target: `50`

Array numbers: `5,40,81,45,20,22,30,41,22,9,32,25,18,17,9,10,40,28`


### Budget App
- Input income amount
- Input expense amount
- Reset will delete all previously input
- Inputing expense amount at first is not allowed
- Inputing expense above the last balance is not allowed


by [Me](https://mahendra.page).
