# Szerveroldali webprogramozás - 1. ZH (minta)

## Tudnivalók

<details>
<summary>Szabályok megjelenítése</summary>

- A zárthelyi megoldására **120 perc** áll rendelkezésre, amely a kidolgozás mellett **magába foglalja** a kötelező nyilatkozat értelmezésére és kitöltésére, a feladatok elolvasására, az anyagok letöltésére, összecsomagolására és feltöltésére szánt időt is.
- A kidolgozást a ZH rendszeren keresztül kell beadni egyetlen **.zip** állományként. **A rendszer pontban XX:YY-kor lezár, ezután nincs lehetőség beadásra!**
- A `vendor` és `node_modules` (ha létezik) könyvtár beadása **TILOS!**
- A megfelelően kitöltött `STATEMENT.md` (nyilatkozat) nélküli megoldásokat **nem értékeljük**.
- A **mesterséges intelligencia bárminemű igénybevétele TILOS** (beleértve a kódszerkesztőhöz tartozó olyan kiegészítőket is, amelyek képesek kódot generálni vagy kódjavaslatokat adni). Szintén tiltott a zárthelyi időtartama alatt **emberi segítséget igénybe venni vagy más vizsgázónak segítséget nyújtani, illetve bármilyen adathordozót a laborgépekbe bedugni, telefont/okosórát/stb. kéznél tartani!** A fentiek közül bármely szabály megszegése esetén minden érintett hallgatónak **azonnali és végleges elégtelen** jár a tárgyból javítási lehetőség nélkül!
- A feladatok megoldása során **csak az alább linkelt dokumentációk és letöltések, illetve a ZH rendszerbe előzetesen feltöltött saját anyagok** használhatók:
  - [https://www.php.net/](php.net)
  - [https://fakerphp.org/](Faker dokumentáció)
  - [https://laravel.com/framework/docs/](Laravel dokumentáció)
  - [https://webprogramozas.inf.elte.hu/downloads/szerver.html](Szerveroldali webprogramozás letöltések)
- A zárthelyi alatt az internetelérés a fenti dokumentációkra korlátozott, így a segédanyagként **behozott Laravel-projektek telepíthetőségét nem tudjuk biztosítani**, de a forráskód felhasználható a megoldás során.
- A feladatokat **Laravel** környezetben, **PHP** nyelven kell megoldani, a **tantárgy keretein belül tanult** technológiák használatával és a biztosított **kezdőcsomagból kiindulva**! 
</details>

<details>
<summary>Kezdőcsomag letöltése és beüzemelése</summary>

1. A zárthelyihez tartozó kezdőcsomagot [ide kattintva](#TODO) tudod letölteni ZIP-be csomagolva.
2. Kicsomagolás, majd `cd` a megfelelő könyvtárba
3. `copy .env.example .env`
4. `composer install`
5. `cmd /c "type nul > database/database.sqlite"`
6. `php artisan key:generate`
7. `php artisan migrate:fresh --seed`
8. `npm i`
9. `composer run dev`
</details>

## Adatbázis

A feladathoz a kezdőcsomagban félkészen adjuk a migrációkat, modelleket és seedert. Az alábbi modellekkel kell dolgozni:

- `Sighting` - egy UFO-észlelés
  - `id`
  - `location` - string; az észlelés helyszíne
  - `craft_type` - string; az észlelt repülő tárgy típusa
  - `identified` - boolean, alapértelmezetten hamis; sikerült-e már azonosítani a repülő tárgyat vagy nyomoznak még
  - `description` - text, lehet null; részletes leírása az észlelésnek
  - `created_at`
  - `updated_at`
- `Witness` - egy szemtanú
  - `id`
  - `name`: string; a szemtanú neve
  - `created_at`
  - `updated_at`

_Természetesen 1:N kapcsolatot egy felvett idegenkulcs mezővel, N:N kapcsolatot pedig külön kapcsolótábla létrehozásával tárolunk. A kapcsolótábla neve az összekapcsolt modellek nevéből képzendő betűrendi sorrendben!_

A fenti modellek közötti kapcsolatok:

- `Sighting` N : N `Witness`
  - Egy észlelésnek több szemtanúja lehet, és egy szemtanú több különböző UFO-t is észlelhet.

## Feladatok

### 1. feladat: adatmegjelenítés, nézetsablonok (9 pont)

- a. (2 pont) A főoldalon töltsd fel az **Active investigations** (folyamatban lévő vizsgálatok, ahol az `identified` mező még hamis) és **Closed investigations** (lezárt vizsgálatok, ahol az `identified` mező már igaz) statisztikai kártyákat az egyes állapotokba tartozó észlelések darabszámával a `SightingController` vezérlő `home()` metódusából. Az adatokat a vezérlőben add át a `home.blade.php` nézetnek, majd jelenítsd meg őket a megfelelő helyen.
- b. (1 pont) Alkalmazd a közös elrendezést a `sightings.index` nézetre a `layouts.app` sablon használatával, és állítsd be a megfelelő fejléc- és tartalmi szekciókat a többi nézethez alkalmazkodó módon!
- c. (1 pont) A `sightings.index` nézetben jelenítsd meg az összes észlelést! Az utolsó oszlop tartalma csak akkor jelenjen meg, ha még aktív a vizsgálat, különben üres cella legyen! A táblázat soraihoz használhatod az alábbi sablont (a --- feliratú mezők későbbi feladatok, nem szükséges őket egyelőre kitölteni):
    ```php
    <tr>
        <td class="px-3 py-2">67</td>
        <td class="px-3 py-2">Budapest</td>
        <td class="px-3 py-2">---</td>
        <td class="px-3 py-2">triangle</td>
        <td class="px-3 py-2">This is a very rare sighting.</td>
        <td class="px-3 py-2">---</td>
        <td class="px-3 py-2">
            <a href="#" class="button-primary">
                {{ __('Mark identified') }}
            </a>
        </td>
    </tr>
    ```
- d. (2 pont) Bővítsd az előző feladatot lapozással! Egyszerre csak 9 észlelés legyen látható, és helyezz el egy lapozót a táblázat alatt!
- e. (1 pont) A táblázat utolsó előtti oszlopába írd ki, hogy hány szemtanú látta az adott észlelést! (Mivel ennek seedelése későbbi feladat lesz, egyelőre 0-t kell látnod minden sorban. Természetesen a pont csak akkor jár, ha a lekérdezés tényleg megtörténik, beégetett 0 értékre nem.)
- f. (2 pont) Az előző feladatot olyan módon oldd meg, hogy ne okozz N+1 problémát!

## 2. feladat: adatbázis, modellek, migrációk (9 pont)

**Figyelem:** a migrációval és factoryval/seederrel kapcsolatos feladatok megoldása után ajánlott futtatni egy `php artisan migrate:fresh --seed` parancsot az ellenőrzéshez.

- a. (1 pont) Adj hozzá a `sightings` migrációhoz egy új dátum (date) típusú mezőt `spotted_on` néven! A mező értékét írd ki az észleléseket listázó táblázat **Spotted** feliratú oszlopába! 
- b. (1 pont) Oldd meg, hogy az imént hozzáadott mező új észlelés létrehozásakor kitölthető legyen tömeges hozzárendeléssel!
- c. (2 pont) A factoryban vagy seederben oldd meg, hogy a `spotted_on` mező értéke minden rekordnál egy véletlen dátumra essen az előző 10 napból!
  - Segítség a dátumkalkulációhoz: pl. Faker használatával generálhatsz egy dátumot és időpontot a megadott intervallumból, majd eldobhatod az időpontot `format('Y-m-d')` használatával! _(A formázás az SQLite adatbázis miatt **szükséges**, mivel itt nincs külön időpont nélküli dátum típus.)_
- d. (3 pont) A seederben oldd meg, hogy minden észleléshez tartozzon 3-5 darab véletlenszerűen válaszott szemtanú!
  - A teljes pontszám csak akkor jár ha a szemtanúk darabszáma és személye is véletlenszerű!
- e. (2 pont) A `create_sighting_witness_table` (kapcsolótábla) migrációja jelenleg bármilyen `sighting_id` és `witness_id` számpárt megenged. Biztosítsd a migrációban a hivatkozási épség megszorítását az adatbázisban, vagyis csak létező észlelés és szemtanú azonosítója legyen beírható a mezőkbe! Biztosítsd azt is, hogy ugyanazt a számpárt ne lehessen többször beszúrni!

## 3. feladat: útvonalak, űrlapfeldolgozás (12 pont)

- a. (2 pont) Hozd létre a `web.php` fájlban azokat az útvonalakat (a szemantikailag indokolt HTTP metódussal), amelyek egy új észlelés mentéséért felelősek és a `SightingController` megfelelő feldolgozó metódusát hívják meg!
  - Ne feledd, a létrehozás két lépésből áll: egy kitöltendő űrlap megjelenítéséből és egy feldolgozásból!
- b. (1 pont) A `sightings.create` nézetben állítsd be az űrlap `action` és `method` attribútumát megfelelően! **Ne égess be kész URL-eket!**
- c. (3 pont) Az űrlap elküldésekor végezd el a következő validációkat:
  - `location`: kötelező, szöveg, legfeljebb 64 karakter
  - `spotted_on`: kötelező, dátum, nem lehet a mai nap után
  - `craft_type`: kötelező, szöveg, csak a `CRAFT_TYPES` konstansban lévő kulcsok egyike lehet az értéke
  - `description`: nem kötelező, szöveg
- d. (2 pont) Helytelen adatok esetén az űrlapon jelenítsd meg a hibaüzeneteket a hibás mező alatt/mellett, valamint biztosítsd a beírt értékek és a legördülő menüben kijelölt elem állapottartását.
- e. (1 pont) Helyes adatok esetén jöjjön létre az adatbázisban az észlelés, és történjen átirányítás a listázó oldalra!
- f. (1 pont) A listázó oldal tetején lévő zöld blokk csak sikeres mentést követően jelenjen meg, és a félkövér szövegek helyére helyettesítődjön be az új észlelés megfelelő adatmezője!
- g. (2 pont) A vezérlők és útvonalak már elő vannak készítve arra, hogy egy PATCH kéréssel az URL-paraméterben szereplő észlelésnél a vizsgálatot lezárjuk, vagyis az azonosítatlan repülő tárgyat azonosítsuk. Oldd meg, hogy a listázó oldalon a **Mark identified** feliratú linkre kattintva a megfelelő kérés elküldésre kerüljön!