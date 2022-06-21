<div id="order">
    <div class="container">
        <div class="row order-content">
            <div class="col-sm-8 col-xs-12 seat_content ph0">
                <h2>order a ticket</h2>
                <div class="entry-order-content">
                    <form id="msform" name="msform">
                        <!-- fieldsets -->
                        <fieldset>
                            <div class="wpc-content">
                                <h3>location</h3>
                                <select name="location">
                                    <option>Tenguu Cinema Tysons corner</option>
                                    <option>Tenguu Cinema </option>
                                    <option>Tenguu Cinema corner</option>
                                    <option>Tenguu Cinema Tysons</option>
                                </select>
                                <h3 class="mt3">Movie</h3>
                                <select>
                                    <option>Dead pool</option>
                                    <option>THE BATTLE OF ALGIERS (DI ALGERI)</option>
                                    <option>LORD OF THE RINGS: THE RETURN OF THE KINGS</option>
                                    <option>Tenguu Cinema Tysons corner</option>
                                </select>
                                <h3 class="mt3">Date</h3>
                                <input type='date' class="datetime"/>
                                <h3 class="mt3">TIME</h3>
                                <ul class="order-date">
                                    <li><a href="javascript:;"><i>11:50</i></a></li>
                                    <li><a href="javascript:;"><i>13:40</i></a></li>
                                    <li><a href="javascript:;"><i>16:35</i></a></li>
                                    <li><a href="javascript:;"><i>17:30</i></a></li>
                                    <li><a href="javascript:;"><i>19:50</i></a></li>
                                    <li><a href="javascript:;"><i>21:10</i></a></li>
                                </ul>
                            </div>
                            <input type="button" name="next" class="next action-button" value="Next" />
                        </fieldset>
                        <fieldset class="seat-content">
                            <div class="wpc-content">
                                <h3 class="seat_title">seat</h3>
                                <div id="seat-map"></div>
                                <div id="legend"></div>
                            </div>
                            <input type="button" name="previous" class="action-button previous" value="Previous" />
                            <input type="submit" name="submit" class="submit action-button" value="Submit" />
                        </fieldset>
                    </form>
                </div>
            </div>
            <div class="col-sm-4 col-xs-12 order_sidebar ph0">
                <h2>Your Information</h2>
                <div class="order-details">
                    <span> Location:</span><p id="locationp">Tenguu Cinema Tysons corner</p>
                    <span>Time:</span>  <p>2016.3.8 18:30</p>
                    <span>Seat: </span>
                    <ul id="selected-seats"></ul>
                    <div>Tickets: <span id="counter">0</span></div>
                    <div>Total: <b>$<span id="total">0</span></b></div>
                </div>
                <a href="javascript:;" class="close-window"><i class="fa fa-times"></i></a>
            </div>
        </div>
    </div>
</div>
