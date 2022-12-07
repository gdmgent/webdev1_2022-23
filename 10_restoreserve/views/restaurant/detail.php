<section class="detail">

        <div class="info">
            <div class="text">
                <h1><?= $restaurant->name; ?> <sup><?= str_repeat('*', $restaurant->stars); ?></sup></h1>
                <p><?= $restaurant->city; ?></p>
            </div>
            <img src="/images/restaurant/<?= $restaurant->image; ?>">
        </div>
        
        
        
        <form method="post">
            <h2>Maak een afspraak</h2>
            <div class="inner">
                <label>
                    Datum
                    <input type="date" name="date" required>
                </label>
                <label>
                    Tijdstip
                    <select name="time" required>
                        <option value="">Selecteer het tijdstip van aankomst...</option>
                        <option>12:00</option>
                        <option>12:30</option>
                        <option>13:00</option>
                        <option>13:30</option>
                        <option>18:00</option>
                        <option>18:30</option>
                        <option>19:00</option>
                        <option>19:30</option>
                        <option>20:00</option>
                    </select>
                </label>
                <label>
                    Aantal personen
                    <input type="number" name="number_of_people" min="1" max="10" required>
                </label>
                <label>
                    Naam
                    <input type="text" name="name" required>
                </label>
                <label>
                    E-mail
                    <input type="email" name="email" required>
                </label>
                <label>
                    Opmerkingen
                    <textarea name="remark"></textarea>
                </label>
                <button name="make_reservation" type="submit">Maak afspraak</button>
            </div>
        </form>
    </section>