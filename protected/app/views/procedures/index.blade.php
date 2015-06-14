<head>    {{ HTML::style('public/css/main.css'); }}</head>
<div class="page-content row">
    <div class="page-header">
        <div class="page-title">
            <h3> Operating Procedures
                <small> Detailed explanation of how to perform most restaurant related tasks</small>
            </h3>
        </div>

        <ul class="breadcrumb">
            <li><a href="{{ URL::to('dashboard') }}">Home</a></li>
            <li class="active">Operating Procedures</li>
        </ul>

    </div>

    <div class="page-content-wrapper">

        <!-- YOUR CONTENT GOES HERE -->
        @if (Session::get('sid') == 1)

            <h1>Operating Procedures (Morpeth)</h1>
            <div class="col-md-4">
                <ul>
                    <li> BASIC</li>
                    <ul>
                        <li>{{ HTML::link('#p000', 'General')}}</li>
                        <li>{{ HTML::link('#p001', 'Opening Times')}}</li>
                        <li>{{ HTML::link('#p002', 'Opening the Restaurant')}}</li>
                        <li>{{ HTML::link('#p003', 'Closing the Restaurant')}}</li>
                        <li>{{ HTML::link('#p004', 'Restaurant Cleaning Duties')}}</li>
                        <li>{{ HTML::link('#p007', 'Drain / Clean the Glasswasher / Dishwasher')}}</li>
                        <li>{{ HTML::link('#p008', 'Cleaning the Toilets')}}</li>
                        <li>{{ HTML::link('#p009', 'Wash / Press Napkins')}}</li>
                        <li>{{ HTML::link('#p010', 'Accepting Deliveries')}}</li>
                        <li>{{ HTML::link('#p011', 'Taking a Reservation')}}</li>
                        <li>{{ HTML::link('#p012', 'Restaurant Service Procedure')}}</li>
                        <li>{{ HTML::link('#p013', 'Taking a Voucher as Payment')}}</li>
                        <li>{{ HTML::link('#p014', 'Recording Staff Food / Wastage')}}</li>
                        <li>{{ HTML::link('#p023', 'Training')}}</li>
                        <li>{{ HTML::link('#p024', 'Cleaning Coffee Machine (Daily)')}}</li>
                        <li>{{ HTML::link('#p025', 'Using Cleaning Chemicals')}}</li>
                        <li>{{ HTML::link('#p026', 'Polishing Glass / Cutlery')}}</li>
                        <li>{{ HTML::link('#p027', 'Taking an Order')}}</li>
                        <li>{{ HTML::link('#p029', 'Age Verification Policy')}}</li>
                        <li>{{ HTML::link('#p032', 'Taking an Email Reservation')}}</li>
                    </ul>
                    <li>HEALTH & SAFETY / GRIEVANCE / HOLIDAYS</li>
                    <ul>
                        <li>{{ HTML::link('#p015', 'Holiday / Absence Requests')}}</li>
                        <li>{{ HTML::link('#p016', 'Reporting a Grievance')}}</li>
                        <li>{{ HTML::link('#p019', 'General Health & Safety at Workplace')}}</li>
                        <li>{{ HTML::link('#p020', 'Specific Health & Safety Issues')}}</li>


                    </ul>
                    <li>MANAGERIAL</li>
                    <ul>
                        <li>{{ HTML::link('#p021', 'Raising Requirements / Ordering')}}</li>
                        <li>{{ HTML::link('#p022', 'End of Day (Till)')}}</li>
                        <li>{{ HTML::link('#p028', 'End of Day (Closing)')}}</li>
                        <li>{{ HTML::link('#p017', 'Taking a Deposit')}}</li>
                        <li>{{ HTML::link('#p030', 'Taking Payments over the Phone')}}</li>
                        <li>{{ HTML::link('#p005', 'Cleaning Coffee Machine')}}</li>
                        <li>{{ HTML::link('#p006', 'Descaling Coffee Machine')}}</li>
                        <li>{{ HTML::link('#p031', 'Stock Checking')}}</li>
                    </ul>
                </ul>
            </div>


            <div class="col-md-8" id="procedures">

                <div class="panel panel-default" id="p000">
                    <div class="panel-heading">
                        <div class="panel-title"><h3 id="000">NTP 000 : General</h3></div>
                    </div>
                    <div class="panel-body">
                        <h4>Purpose</h4>

                        <p>To outline the general rules at the restaurant</p>
                        <h4>Responsibilities</h4>
                        <table class="table">
                            <tr>
                                <th>Applies to</th>
                                <td> Front of House</td>
                                <th>To be completed</th>
                                <td>Daily</td>
                                <td>Start of Shift</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Kitchen</td>
                                <td></td>
                                <td>Weekly</td>
                                <td>End of Shift</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>All Staff {{ HTML::image('uploads/images/small-tick.png') }}</td>
                                <td></td>
                                <td>Fortnightly</td>
                                <td>Start of Employment</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>As Required {{ HTML::image('uploads/images/small-tick.png') }}</td>
                                <td></td>
                            </tr>
                        </table>
                        <p></p>
                        <h4>Required Materials</h4>

                        <p>None</p>
                        <h4>Procedure</h4>
                        <ul>
                            <li>Staff Food</li>
                            <ul>
                                <li>Staff food will be provided at the end of each shift. Choice of food will be decided
                                    by
                                    the head
                                    chef but will not include duck or seafood dishes.
                                </li>
                            </ul>
                            <li>Staff Uniform</li>
                            <ul>
                                <li>A personal staff uniform will be provided when you start. It is your responsibility
                                    to
                                    wash and
                                    take care of this uniform.
                                </li>
                                <li>Do not use washing facilities to wash any staff uniforms with napkins or chefs
                                    whites.
                                </li>
                                <li>You must fill out and sign the new employee form which contains information on staff
                                    uniforms.
                                </li>
                            </ul>
                            <li>Changing Facilities</li>
                            <ul>
                                <li>Please use the toilets as changing facilities</li>
                            </ul>
                            <li>Storing Valuables</li>
                            <ul>
                                <li>Use the lockers provided in the store room for keeping any valuables.</li>
                                <li>Keep the key safe and leave in the locker once finished</li>
                            </ul>
                            <li>Mobile Phone</li>
                            <ul>
                                <li>No mobile phones are allowed to be used at work and must be kept in store room
                                    locker whilst a work
                                </li>
                            </ul>
                            <ul>
                                <li>Staff discount is 15% for both take away and eat in</li>
                                <li>When paying for staff food another member of staff must take payment</li>
                                <li>Additional staff food can be purchased with discount</li>
                                <li>Staff food must be recorded on appropriate form</li>
                            </ul>
                            <li>Recording your Hours</li>
                            <ul>
                                <li>Record your hours in the staff timesheet located behind the bar.</li>
                            </ul>
                            <li>Forms</li>
                            <ul>
                                <li>All forms unless otherwise stated must be handed to a member of management.
                                    Suchittra Nadon can be contacted through management or email:
                                    manager.morpeth@nadonthai.co.uk
                                </li>
                                <li>Complete training form and sign within first 2 weeks of employment.</li>
                                <li>Complete employee details form and sign within first week of employment</li>
                            </ul>
                            <li>CCTV</li>
                            <ul>
                                <li>For the purpose of crime prevention CCTV cameras operate within the restaurant. The
                                    data holder is SUCHITTRA NADON.
                                </li>

                            </ul>
                            <li>Menus</li>
                            <ul>
                                <li>a. Take the time to familiarize yourself with what menus are available and at what
                                    times. Unless otherwise stated the times on menus refer to orders that go into the
                                    kitchen before
                                    the finish time. Orders going into kitchen afterwards (within reason) will be
                                    excluded.
                                </li>
                                <li>DON’T swap menu items. Offers are only available for what is on the promotional
                                    menu.
                                </li>
                            </ul>
                            <li>Pay Slips</li>
                            <ul>
                                <li>Pay slips on request will be sent to the email address you have given on the new
                                    employee form.
                                </li>
                            </ul>
                            <li>Payment</li>
                            <ul>
                                <li>Payment is via bank transfer to bank account on new employee form</li>
                            </ul>

                        </ul>
                    </div>
                    <div class="panel-footer">
                        <table class="table">
                            <tr>
                                <th>Version</th>
                                <td>02</td>
                                <th>Last Amended</th>
                                <td>08/06/2015</td>
                                <th>Author</th>
                                <td>Geoff Whitehead</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!----------------------------------------------------------------------------------------------------------------------------------------------------------------->

                <div class="panel panel-default" id="p001">
                    <div class="panel-heading">
                        <div class="panel-title"><h3 id="001">NTP 001 : Opening Times</h3></div>
                    </div>
                    <div class="panel-body">


                        <h4>Purpose</h4>

                        <p>To detail important restaurant operating times</p>
                        <h4>Responsibilities</h4>
                        <table class="table">
                            <tr>
                                <th>Applies to</th>
                                <td> Front of House</td>
                                <th>To be completed</th>
                                <td>Daily</td>
                                <td>Start of Shift</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Kitchen</td>
                                <td></td>
                                <td>Weekly</td>
                                <td>End of Shift</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>All Staff {{ HTML::image('uploads/images/small-tick.png') }}</td>
                                <td></td>
                                <td>Fortnightly</td>
                                <td>Start of Employment</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>As Required {{ HTML::image('uploads/images/small-tick.png') }}</td>
                                <td></td>
                            </tr>
                        </table>
                        <p></p>
                        <h4>Required Materials</h4>

                        <p>None</p>
                        <h4>Procedure</h4>
                        <ol>
                            <li>11:00am Arrive at restaurant to begin cleaning</li>
                            <li>11:45am Make preparations to open restaurant</li>
                            <li>12:00am Open</li>
                            <li>2:30pm Last order into kitchen. Kitchen is closed after this.</li>
                            <ul>
                                <li>3:20pm if customers are still inside. Politely let them know that you will be
                                    closing the
                                    restaurant in 10 minutes.
                                </li>
                                <li>3:30pm politely tell remaining customers that the restaurant is now closed.</li>
                            </ul>
                            <li>5:00pm Arrive for evening shift</li>
                            <li>5:30pm Open</li>
                            <li>9:30pm Send staff food order into kitchen</li>
                            <li>10:00pm Last orders into kitchen (Sun – Thurs) (Excluding desserts)</li>
                            <li>10:30pm Last orders into kitchen (Fri – Sat) (Excluding desserts)</li>

                        </ol>
                    </div>
                    <div class="panel-footer">
                        <table class="table">
                            <tr>
                                <th>Version</th>
                                <td>01</td>
                                <th>Last Amended</th>
                                <td>27/04/2014</td>
                                <th>Author</th>
                                <td>Geoff Whitehead</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!----------------------------------------------------------------------------------------------------------------------------------------------------------------->

                <div class="panel panel-default" id="p002">
                    <div class="panel-heading">
                        <div class="panel-title"><h3 id="002">NTP 002 : Opening the Restaurant</h3></div>
                    </div>
                    <div class="panel-body">


                        <h4>Purpose</h4>

                        <p>To detail responsibilities when opening the restaurant</p>
                        <h4>Responsibilities</h4>
                        <table class="table">
                            <tr>
                                <th>Applies to</th>
                                <td> Front of House</td>
                                <th>To be completed</th>
                                <td>Daily</td>
                                <td>Start of Shift</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Kitchen</td>
                                <td></td>
                                <td>Weekly</td>
                                <td>End of Shift</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>All Staff {{ HTML::image('uploads/images/small-tick.png') }}</td>
                                <td></td>
                                <td>Fortnightly</td>
                                <td>Start of Employment</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>As Required {{ HTML::image('uploads/images/small-tick.png') }}</td>
                                <td></td>
                            </tr>
                        </table>
                        <p></p>
                        <h4>Required Materials</h4>

                        <p>None</p>
                        <h4>Procedure</h4>
                        <ul>
                            <li>Hoover or sweep stairs, restaurant, toilet waiting area</li>
                            <li>Mop restaurant and toilets</li>
                            <li>Tidy restaurant</li>
                            <li>Check bookings for the day</li>
                            <li>Make sure all tables are fully set and tidy / chairs are clean</li>
                            <li>Turn on music</li>
                            <li>Turn on lights for restaurant / floor lights / hallway / toilets</li>
                            <li>Check cutlery and pots have been brought from the kitchen</li>
                            <li>Prepare ice and lemon</li>
                            <li>Make booking sheet for the day or following days if needed</li>
                            <li>Respond to any voice-mails</li>
                            <li>Raise any stock shortages</li>

                        </ul>
                    </div>
                    <div class="panel-footer">
                        <table class="table">
                            <tr>
                                <th>Version</th>
                                <td>01</td>
                                <th>Last Amended</th>
                                <td>27/04/2014</td>
                                <th>Author</th>
                                <td>Geoff Whitehead</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!----------------------------------------------------------------------------------------------------------------------------------------------------------------->

                <div class="panel panel-default" id="p003">
                    <div class="panel-heading">
                        <div class="panel-title"><h3 id="003">NTP 003 : Closing the Restaurant</h3></div>
                    </div>
                    <div class="panel-body">


                        <h4>Purpose</h4>

                        <p>To detail responsibilities when closing the restaurant</p>
                        <h4>Responsibilities</h4>
                        <table class="table">
                            <tr>
                                <th>Applies to</th>
                                <td> Front of House</td>
                                <th>To be completed</th>
                                <td>Daily</td>
                                <td>Start of Shift</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Kitchen</td>
                                <td></td>
                                <td>Weekly</td>
                                <td>End of Shift</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>All Staff {{ HTML::image('uploads/images/small-tick.png') }}</td>
                                <td></td>
                                <td>Fortnightly</td>
                                <td>Start of Employment</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>As Required {{ HTML::image('uploads/images/small-tick.png') }}</td>
                                <td></td>
                            </tr>
                        </table>
                        <p></p>
                        <h4>Required Materials</h4>

                        <p>None</p>
                        <h4>Procedure</h4>
                        <ol>
                            <li>All tables are set up fully</li>
                            <li>Toilets are cleaned (NTP008)</li>
                            <li>Bar area is wiped down and tidied</li>
                            <li>Limes/Lemons are put into the fridge and covered</li>
                            <li>All cutlery / coffee cups / saucers / tea pots taken from the kitchen and put away</li>
                            <li>Cutlery and glasses are all polished and put away (NTP026)</li>
                            <li>Napkins put into washing machine (NTP009)</li>
                            <li>Coffee machine is cleaned and emptied. (NTP024)</li>
                            <li>Check all chairs are clean and straight</li>
                            <li>All glasses cleaned and polished</li>
                            <li>Glass machine is emptied, drained, turned off and the door left open (NTP007)</li>
                            <li>Bins are emptied (NTP020)</li>
                            <li>Boxes put away</li>
                            <li>Store room is clean. Paper and boxes put into the bin</li>
                            <li>Dirty menus are wiped and put back into holder</li>
                            <li>Fridges are fully stocked</li>
                            <li>Fridge glass is polished</li>
                            <li>Candles on tables are replaced</li>
                            <li>Take away menus are replaced in restaurant and hallway</li>
                            <li>Front door sign is brought inside</li>

                        </ol>
                    </div>
                    <div class="panel-footer">
                        <table class="table">
                            <tr>
                                <th>Version</th>
                                <td>02</td>
                                <th>Last Amended</th>
                                <td>08/06/2015</td>
                                <th>Author</th>
                                <td>Geoff Whitehead</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!----------------------------------------------------------------------------------------------------------------------------------------------------------------->
                <div class="panel panel-default" id="p004">
                    <div class="panel-heading">
                        <div class="panel-title"><h3 id="004">NTP 004 : Restaurant Cleaning Duties</h3></div>
                    </div>
                    <div class="panel-body">


                        <h4>Purpose</h4>

                        <p>Outlines cleaning duties of staff</p>
                        <h4>Responsibilities</h4>
                        <table class="table">
                            <tr>
                                <th>Applies to</th>
                                <td> Front of House</td>
                                <th>To be completed</th>
                                <td>Daily</td>
                                <td>Start of Shift</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Kitchen</td>
                                <td></td>
                                <td>Weekly</td>
                                <td>End of Shift</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>All Staff {{ HTML::image('uploads/images/small-tick.png') }}</td>
                                <td></td>
                                <td>Fortnightly</td>
                                <td>Start of Employment</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>As Required {{ HTML::image('uploads/images/small-tick.png') }}</td>
                                <td></td>
                            </tr>
                        </table>
                        <p></p>
                        <h4>Required Materials</h4>

                        <p>NTF004 : Cleaning Schedule</p>
                        <h4>Procedure</h4>
                        <ul>
                            <li>It the responsibility of all front of house staff to ensure cleaning records are kept up
                                to
                                date,
                                please try to maintain this
                            </li>
                            <li>Refer to form NTF004 when performing any cleaning duty and include your initials on job
                                completion.
                                Include the date it was completed (fortnightly / monthly jobs only).
                            </li>


                        </ul>
                    </div>
                    <div class="panel-footer">
                        <table class="table">
                            <tr>
                                <th>Version</th>
                                <td>01</td>
                                <th>Last Amended</th>
                                <td>10/05/2014</td>
                                <th>Author</th>
                                <td>Geoff Whitehead</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!----------------------------------------------------------------------------------------------------------------------------------------------------------------->

                <div class="panel panel-default" id="p007">
                    <div class="panel-heading">
                        <div class="panel-title"><h3 id="007">NTP 007 : Drain / Clean the Glasswasher / Dishwasher
                                (CLASSEQ machines)</h3></div>
                    </div>
                    <div class="panel-body">


                        <h4>Purpose</h4>

                        <p>This procedure outlines the method to drain / clean / descale the glasswasher / dishwasher.
                            The drain
                            procedure is relevant to the CLASSEQ machines. Note : The descale is only relevant to
                            machines
                            without a
                            integrated softener</p>
                        <h4>Responsibilities</h4>
                        <table class="table">
                            <tr>
                                <th>Applies to</th>
                                <td>Front of House</td>
                                <th>To be completed</th>
                                <td>Daily</td>
                                <td>Start of Shift</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Kitchen</td>
                                <td></td>
                                <td>Weekly</td>
                                <td>End of Shift</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>All Staff {{ HTML::image('uploads/images/small-tick.png') }}</td>
                                <td></td>
                                <td>Fortnightly</td>
                                <td>Start of Employment</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>As Required {{ HTML::image('uploads/images/small-tick.png') }}</td>
                                <td></td>
                            </tr>
                        </table>
                        <p></p>
                        <h4>Required Materials</h4>
                        <ul>
                            <li>Glass washer / dish washer cleaning powder or descaling powder (descaling not necessary
                                for
                                machines
                                with softener (salt))
                            </li>
                            <li>Rubber Gloves</li>
                            <li>PPE</li>
                        </ul>
                        <h4>Procedure</h4>
                        <ol>
                            <li>How to drain</li>
                            <ol>
                                <li>Close the machine door</li>
                                <li>Press the power button so the machine turns off</li>
                                <li>Press the rinse/wash button (the blue drain light should now have come on)</li>
                                <li>Leave to drain for 5 min (don’t open the door)</li>
                                <li>Once blue light goes off switch the red wall switch off (end of night)</li>
                                <li>Leave door OPEN overnight to dry properly</li>
                            </ol>
                            <li>How to clean / descale</li>
                            <ol>
                                <li>Wear adequate PPE (rubber gloves and eye protection)</li>
                                <li>Drain the machine as in steps above and then turn the machine back on to refill</li>
                                <li>Once filled put 3 scoops of cleaning powder in the water (refer to packaging
                                    instructions
                                    for
                                    descaling dilutions)
                                </li>
                                <li>Brush powder in edges of machine/ anywhere particularly dirty and in door
                                    well.(excludes
                                    descaling)
                                </li>
                                <li>Press the operate button (same button you use to wash glasses with)</li>
                                <li>Put the machine through 3 wash cycles</li>
                                <li>Once done drain the machine as in the above steps (refill and drain twice if lots of
                                    cleaning
                                    solution remains)
                                </li>
                                <li>Refill the machine</li>
                                <li>Cleaning procedure finished</li>
                            </ol>
                        </ol>
                    </div>
                    <div class="panel-footer">
                        <table class="table">
                            <tr>
                                <th>Version</th>
                                <td>02</td>
                                <th>Last Amended</th>
                                <td>08/06/2015</td>
                                <th>Author</th>
                                <td>Geoff Whitehead</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!----------------------------------------------------------------------------------------------------------------------------------------------------------------->
                <div class="panel panel-default" id="p008">
                    <div class="panel-heading">
                        <div class="panel-title"><h3 id="008">NTP 008 : Cleaning Toilets</h3></div>
                    </div>
                    <div class="panel-body">


                        <h4>Purpose</h4>

                        <p>This procedure outlines the method to clean the toilets.</p>
                        <h4>Responsibilities</h4>
                        <table class="table">
                            <tr>
                                <th>Applies to</th>
                                <td>Front of House</td>
                                <th>To be completed</th>
                                <td>Daily</td>
                                <td>Start of Shift</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Kitchen</td>
                                <td></td>
                                <td>Weekly</td>
                                <td>End of Shift</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>All Staff {{ HTML::image('uploads/images/small-tick.png') }}</td>
                                <td></td>
                                <td>Fortnightly</td>
                                <td>Start of Employment</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>As Required {{ HTML::image('uploads/images/small-tick.png') }}</td>
                                <td></td>
                            </tr>
                        </table>
                        <p></p>
                        <h4>Required Materials</h4>
                        <ul>
                            <li>PPE (rubber gloves / eye protection)</li>
                            <li>Toilet bowl cleaner</li>
                            <li>Anti-bacterial foaming spray</li>
                            <li>Toilet rolls</li>
                            <li>Blue roll</li>
                            <li>Air freshener</li>
                            <li>2 x large takeaway bags for bins</li>
                            <li>Glass cleaner</li>
                            <li>Mop and bucket</li>
                        </ul>
                        <h4>Procedure</h4>
                        <ol>
                            <li>First wear any required PPE located in store room cleaning section. Rubber gloves and
                                eye
                                protection
                            </li>
                            <li>Replace bags in men and women’s bin and discard of rubbish</li>
                            <li>Replace any missing toilet rolls so there is 3 on holder and 1 on hanger</li>
                            <li>Pour toilet bowl cleaner under rims of toilet bowl in men and women’s</li>
                            <li>Use Antibacterial spray for following:</li>
                            <ul>
                                <li>Spray and wipe around both toilet bowls including basin, seat, behind seat and
                                    cover.
                                </li>
                                <li>Wipe the top of the water basin and surrounding surfaces(window ledge, white
                                    ledge)
                                </li>
                                <li>Completely wipe sink area and surrounding work surface</li>
                                <li>Polish dryer</li>
                                <li>Wipe door handle and other silver fixtures such as toilet roll holders</li>
                            </ul>
                            <li>Use glass cleaner to:</li>
                            <ul>
                                <li>Polish all silver fixtures such as taps and door handles</li>
                                <li>Polish mirrors.</li>
                            </ul>
                            <li>Spray some antibacterial cleaner in bucket and fill with some hot water.</li>
                            <li>Put the yellow cleaning sign where your mopping the floors</li>
                            <li>Mop floors in both toilets and waiting area</li>
                            <li>When finished sign the toilet check sheet</li>
                            <li>Leave hazard sign out until floors are completely dry</li>

                        </ol>
                    </div>
                    <div class="panel-footer">
                        <table class="table">
                            <tr>
                                <th>Version</th>
                                <td>02</td>
                                <th>Last Amended</th>
                                <td>08/06/2015</td>
                                <th>Author</th>
                                <td>Geoff Whitehead</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!----------------------------------------------------------------------------------------------------------------------------------------------------------------->
                <div class="panel panel-default" id="p009">
                    <div class="panel-heading">
                        <div class="panel-title"><h3 id="009">NTP 009 : Wash / Press Napkins</h3></div>
                    </div>
                    <div class="panel-body">


                        <h4>Purpose</h4>

                        <p>This procedure outlines the method to wash and press the napkins</p>
                        <h4>Responsibilities</h4>
                        <table class="table">
                            <tr>
                                <th>Applies to</th>
                                <td> Front of House</td>
                                <th>To be completed</th>
                                <td>Daily</td>
                                <td>Start of Shift</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Kitchen</td>
                                <td></td>
                                <td>Weekly</td>
                                <td>End of Shift</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>All Staff {{ HTML::image('uploads/images/small-tick.png') }}</td>
                                <td></td>
                                <td>Fortnightly</td>
                                <td>Start of Employment</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>As Required {{ HTML::image('uploads/images/small-tick.png') }}</td>
                                <td></td>
                            </tr>
                        </table>
                        <p></p>
                        <h4>Required Materials</h4>

                        <p>Iron Press</p>
                        <h4>Procedure</h4>
                        <ol>
                            <li>Fill washing machine with napkins. Don’t overfill or the napkins won’t wash properly
                            </li>
                            <li>Put 1 flat cup of powder in washing machine in draw labelled “2”</li>
                            <li>Turn dial to Cotton 40 degrees or 60 degrees</li>
                            <li>Press START and wait until finished</li>
                            <li>Will take 2-3 hours to wash</li>
                            <li>When finished move napkins to dryer and turn the dial to automatic sensor in the 11o
                                clock
                                position
                            </li>
                            <li>Press START and wait until finished</li>
                            <li>Use ironing press to press napkins. Turn dial to unlock, and set to cotton. Wait 5
                                minutes for
                                it to
                                heat up.
                            </li>
                            <li>Fold napkins in half and press 2 at a time.</li>
                            <li>Once finished ironing let the iron cool down before closing and putting away. Do</li>
                        </ol>
                    </div>
                    <div class="panel-footer">
                        <table class="table">
                            <tr>
                                <th>Version</th>
                                <td>01</td>
                                <th>Last Amended</th>
                                <td>10/05/2014</td>
                                <th>Author</th>
                                <td>Geoff Whitehead</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!----------------------------------------------------------------------------------------------------------------------------------------------------------------->
                <div class="panel panel-default" id="p010">
                    <div class="panel-heading">
                        <div class="panel-title"><h3 id="010">NTP 010 : Accepting Deliveries</h3></div>
                    </div>
                    <div class="panel-body">


                        <h4>Purpose</h4>

                        <p>This procedure outlines how to accept a delivery and check contents.</p>
                        <h4>Responsibilities</h4>
                        <table class="table">
                            <tr>
                                <th>Applies to</th>
                                <td> Front of House</td>
                                <th>To be completed</th>
                                <td>Daily</td>
                                <td>Start of Shift</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Kitchen</td>
                                <td></td>
                                <td>Weekly</td>
                                <td>End of Shift</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>All Staff {{ HTML::image('uploads/images/small-tick.png') }}</td>
                                <td></td>
                                <td>Fortnightly</td>
                                <td>Start of Employment</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>As Required {{ HTML::image('uploads/images/small-tick.png') }}</td>
                                <td></td>
                            </tr>
                        </table>
                        <p></p>
                        <h4>Required Materials</h4>

                        <p>None</p>
                        <h4>Procedure</h4>
                        <ol>
                            <li>When accepting an order, before signing, please always check that all the contents of
                                the order
                                are
                                there and they aren't damaged.
                            </li>
                            <li>All delivery notes must then be folded and put in the till drawer</li>
                        </ol>
                    </div>
                    <div class="panel-footer">
                        <table class="table">
                            <tr>
                                <th>Version</th>
                                <td>01</td>
                                <th>Last Amended</th>
                                <td>08/06/2014</td>
                                <th>Author</th>
                                <td>Geoff Whitehead</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!----------------------------------------------------------------------------------------------------------------------------------------------------------------->
                <div class="panel panel-default" id="p011">
                    <div class="panel-heading">
                        <div class="panel-title"><h3 id="011">NTP 011 : Taking a Reservation</h3></div>
                    </div>
                    <div class="panel-body">


                        <h4>Purpose</h4>

                        <p>This procedure outlines how to take a reservation, the amount of time to allocate to a
                            booking, and
                            any
                            restrictions </p>
                        <h4>Responsibilities</h4>
                        <table class="table">
                            <tr>
                                <th>Applies to</th>
                                <td> Front of House</td>
                                <th>To be completed</th>
                                <td>Daily</td>
                                <td>Start of Shift</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Kitchen</td>
                                <td></td>
                                <td>Weekly</td>
                                <td>End of Shift</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>All Staff {{ HTML::image('uploads/images/small-tick.png') }}</td>
                                <td></td>
                                <td>Fortnightly</td>
                                <td>Start of Employment</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>As Required {{ HTML::image('uploads/images/small-tick.png') }}</td>
                                <td></td>
                            </tr>
                        </table>
                        <p></p>
                        <h4>Required Materials</h4>

                        <p>None</p>
                        <h4>Procedure</h4>
                        <ol>
                            <li>New employees in their first week must confirm ALL reservations with a senior member of
                                staff
                            </li>
                            <li>Timings :</li>
                            <ul>
                                <li>Standard times for reservation</li>
                                <li>2 people = 1:30hr</li>
                                <li>3-5 people = 2hr</li>
                                <li>6>8 people = 2:30hr (refer booking to experienced member of staff)</li>
                                <li>>8 people (refer booking to experienced member of staff)</li>
                                <li>Note: for bookings over 6 people on a friday or saturday a deposit must be taken
                                    (refer
                                    NTP017)
                                </li>

                            </ul>
                            <li>In the reservation diary (if the page doesn’t say to refer to reservation sheet) write
                                the
                                persons:
                            </li>

                            <ul>
                                <li>Full name</li>
                                <li>Booking time</li>
                                <li>Number of covers</li>
                                <li>Contact number</li>
                            </ul>
                            <li>If the page says RTS (refer to booking sheet), refer to the booking sheet attached to
                                clipboard.
                                <strong>Don’t write the booking in the diary or it might be missed.</strong></li>
                            <li>Available booking times:</li>
                            <ul>
                                <li>Sun-Thur (excluding public holiday): bookings can be taken at any time.</li>
                                <li>Fri-Sat:</li>
                                <ul>
                                    <li>2 ppl to be taken at 7:00 and 8:30 intervals</li>
                                    <li>4 ppl: 1 or 2 tables at 7:00; no tables at 7:30</li>
                                </ul>
                                <li>Note: If unsure pass booking onto management rather than taking booking at the wrong
                                    time.
                                </li>
                            </ul>
                        </ol>
                    </div>
                    <div class="panel-footer">
                        <table class="table">
                            <tr>
                                <th>Version</th>
                                <td>02</td>
                                <th>Last Amended</th>
                                <td>08/06/2014</td>
                                <th>Author</th>
                                <td>Geoff Whitehead</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!----------------------------------------------------------------------------------------------------------------------------------------------------------------->
                <div class="panel panel-default" id="p012">
                    <div class="panel-heading">
                        <div class="panel-title"><h3 id="012">NTP 012 : Restaurant Service Procedure</h3></div>
                    </div>
                    <div class="panel-body">


                        <h4>Purpose</h4>

                        <p>Full breakdown front of house procedure</p>
                        <h4>Responsibilities</h4>
                        <table class="table">
                            <tr>
                                <th>Applies to</th>
                                <td>Front of House</td>
                                <th>To be completed</th>
                                <td>Daily</td>
                                <td>Start of Shift</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Kitchen</td>
                                <td></td>
                                <td>Weekly</td>
                                <td>End of Shift</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>All Staff {{ HTML::image('uploads/images/small-tick.png') }}</td>
                                <td></td>
                                <td>Fortnightly</td>
                                <td>Start of Employment</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>As Required {{ HTML::image('uploads/images/small-tick.png') }}</td>
                                <td></td>
                            </tr>
                        </table>
                        <p></p>
                        <h4>Required Materials</h4>

                        <p>None</p>
                        <h4>Procedure</h4>
                        <ol>
                            <li>Greeting Customers</li>
                            <ol>
                                <li>Greet and ask If they have made a reservation</li>
                                <li>If they have then ask their name and check against the booking sheet too see which
                                    table is
                                    reserved for them
                                </li>
                                <li>If they haven’t check to see which tables are available (check with experienced
                                    member of
                                    staff)
                                </li>
                                <li>Check to make sure table is completely set</li>
                                <li>Ask if customer would like their jacket hanging(Morpeth)</li>
                                <li>Guide to table</li>
                            </ol>
                            <li>Taking Menus</li>
                            <ol>
                                <li>Take food menu’s</li>
                                <li>Let customer know about any specials available or any items we are out of stock of
                                </li>

                            </ol>
                            <li>Take drinks order</li>
                            <ol>
                                <li>After a few minutes ask if customer is ready to order a drink</li>
                                <li>Write order on small pads and place in appropriate tray at bar for bar person to
                                    make.
                                </li>
                                <li>Remove wine glasses if no bottled wine is ordered</li>
                            </ol>
                            <li>Take drinks</li>
                            <ol>
                                <li>Take drinks to table carrying them on a tray. Place drinks to right side of the
                                    person above
                                    their spoon.
                                </li>
                            </ol>
                            <li>Take food order</li>
                            <ol>
                                <li>When customers have placed their menu’s to the side or looks like they are ready to
                                    order
                                    take
                                    order with a large 3ply pad.
                                </li>
                                <li>Write order on a pad from top to bottom, starting from the person on the top-right
                                    of the
                                    table
                                    working in a clockwise manner. (important for larger tables so that the servers can
                                    quickly
                                    place food on the table).
                                </li>
                                <li>If customer isn’t ordering starters: remove their starter plates.</li>
                                <li>Place cheques on appropriate cheque board: white for mains; pink for starters; blue
                                    for
                                    front of
                                    house.
                                </li>
                            </ol>
                            <li>Take Prawn Crackers over if their order included any</li>
                            <li>Serve Starters</li>
                            <ol>
                                <li>Check the order to see which position ordered the dish</li>
                            </ol>
                            <li>Customer has finished starters</li>
                            <ol>
                                <li>Clear starters away and any cutlery that is one their plate.</li>
                                <li>Check to see if they have finished their drinks and want another</li>
                                <li>Place pots in pot washing section and organize them including placing cutlery in
                                    box
                                </li>
                                <li>Call the cheque in the mains section by pulling it down to the cheque board below
                                </li>
                            </ol>
                            <li>Reset table</li>
                            <ol>
                                <li>Relay any cutlery that’s missing</li>
                                <li>Serve any drinks required</li>
                            </ol>
                            <li>Serve mains</li>
                            <ol>
                                <li>When a table is called start by taking the hot plates to the table and give to each
                                    person
                                </li>
                                <li>Take food out noting their position on the cheque so that you take it to the right
                                    person
                                </li>
                                <li>Check to make sure <strong>ALL</strong> the food has been taken out</li>
                                <li>Check to see if customer has finished any drinks and needs any</li>
                            </ol>
                            <li>Customer finished mains</li>
                            <ol>
                                <li>Clear the table completely</li>
                                <li>Place pots in pot washing section and organize them including placing cutlery in
                                    box
                                </li>
                            </ol>
                            <li>Desserts</li>
                            <ol>
                                <li>Once table is cleared take over dessert menu and ask if they would like to see</li>
                                <li>Let the customer know about any specials on the board, guest ice-cream and any
                                    shortages
                                </li>
                                <li>Once customer is ready take their order and place the white cheque in the starter
                                    position
                                    and
                                    the pink cheque in the front of house cheque board.
                                </li>
                            </ol>
                            <li>Customer finished desserts</li>
                            <ol>
                                <li>Clear their table and ask if you can get them anything else</li>
                            </ol>
                            <li>Customer ask for bill</li>
                            <ol>
                                <li>Write a small cheque stating the “bill t#” and leave it in the tray for the bar
                                    person
                                </li>
                                <li>Bar person to check that everything is included and put bill on tray with mints and
                                    customer
                                    feedback card.
                                </li>
                            </ol>
                            <li>Customer leaving</li>
                            <ol>
                                <li>Help them with their jackets if you took any</li>
                                <li>Hold the door for them</li>
                            </ol>
                            <li>Customer left</li>
                            <ol>
                                <li>Clear table and reset as other tables.</li>
                            </ol>
                        </ol>
                    </div>
                    <div class="panel-footer">
                        <table class="table">
                            <tr>
                                <th>Version</th>
                                <td>01</td>
                                <th>Last Amended</th>
                                <td>27/04/2014</td>
                                <th>Author</th>
                                <td>Geoff Whitehead</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!----------------------------------------------------------------------------------------------------------------------------------------------------------------->
                <div class="panel panel-default" id="p013">
                    <div class="panel-heading">
                        <div class="panel-title"><h3 id="013">NTP 013 : Taking a Voucher as Payment</h3></div>
                    </div>
                    <div class="panel-body">


                        <h4>Purpose</h4>

                        <p>This procedure outlines the method to take a voucher as payment.</p>
                        <h4>Responsibilities</h4>
                        <table class="table">
                            <tr>
                                <th>Applies to</th>
                                <td> Front of House</td>
                                <th>To be completed</th>
                                <td>Daily</td>
                                <td>Start of Shift</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Kitchen</td>
                                <td></td>
                                <td>Weekly</td>
                                <td>End of Shift</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>All Staff {{ HTML::image('uploads/images/small-tick.png') }}</td>
                                <td></td>
                                <td>Fortnightly</td>
                                <td>Start of Employment</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>As Required {{ HTML::image('uploads/images/small-tick.png') }}</td>
                                <td></td>
                            </tr>
                        </table>
                        <p></p>
                        <h4>Required Materials</h4>

                        <p>None</p>
                        <h4>Procedure</h4>
                        <ol>
                            <li>Open the voucher form NTF013 and check the voucher to make sure the amount is correct
                                and it
                                hasn’t
                                already been used.
                            </li>
                            <ol>
                                <li>If the voucher has been used investigate further / call management on 07545313842
                                </li>
                                <li>If not used put a tick next to the voucher in the file to say it has been used.</li>
                            </ol>
                            <li>Cash the voucher off the bill by pressing the subtotal button followed by entering the
                                amount
                                and
                                pressing voucher.
                            </li>
                            <li>You can now show the customer the remainder for them to pay.</li>
                            <li>Put a cross in the voucher and write used</li>
                            <li>Put the crossed out voucher into the till to be included in end of day report.</li>

                        </ol>
                    </div>
                    <div class="panel-footer">
                        <table class="table">
                            <tr>
                                <th>Version</th>
                                <td>01</td>
                                <th>Last Amended</th>
                                <td>10/05/2014</td>
                                <th>Author</th>
                                <td>Geoff Whitehead</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <!----------------------------------------------------------------------------------------------------------------------------------------------------------------->
                <div class="panel panel-default" id="p014">
                    <div class="panel-heading">
                        <div class="panel-title"><h3 id="014">NTP 014 : Recording Staff Food / Wastage</h3></div>
                    </div>
                    <div class="panel-body">


                        <h4>Purpose</h4>

                        <p>This procedure outlines how to record staff food and wastage.</p>
                        <h4>Responsibilities</h4>
                        <table class="table">
                            <tr>
                                <th>Applies to</th>
                                <td>Front of House</td>
                                <th>To be completed</th>
                                <td>Daily</td>
                                <td>Start of Shift</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Kitchen</td>
                                <td></td>
                                <td>Weekly</td>
                                <td>End of Shift</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>All Staff {{ HTML::image('uploads/images/small-tick.png') }}</td>
                                <td></td>
                                <td>Fortnightly</td>
                                <td>Start of Employment</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>As Required {{ HTML::image('uploads/images/small-tick.png') }}</td>
                                <td></td>
                            </tr>
                        </table>
                        <p></p>
                        <h4>Required Materials</h4>

                        <p>None</p>
                        <h4>Procedure</h4>
                        <ol>
                            <li>All wastage drinks must be recorded on the form NTF0141</li>
                            <li>When you order Staff food, order must be written on form NTF0142 and separate order
                                written for
                                kitchen staff.
                            </li>
                        </ol>
                    </div>
                    <div class="panel-footer">
                        <table class="table">
                            <tr>
                                <th>Version</th>
                                <td>01</td>
                                <th>Last Amended</th>
                                <td>10/05/2014</td>
                                <th>Author</th>
                                <td>Geoff Whitehead</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!----------------------------------------------------------------------------------------------------------------------------------------------------------------->
                <div class="panel panel-default" id="p023">
                    <div class="panel-heading">
                        <div class="panel-title"><h3 id="023">NTP 023 : Training</h3></div>
                    </div>
                    <div class="panel-body">


                        <h4>Purpose</h4>

                        <p>This procedure outlines the method to complete the training form for new members of
                            staff.</p>
                        <h4>Responsibilities</h4>
                        <table class="table">
                            <tr>
                                <th>Applies to</th>
                                <td> Front of House</td>
                                <th>To be completed</th>
                                <td>Daily</td>
                                <td>Start of Shift</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Kitchen</td>
                                <td></td>
                                <td>Weekly</td>
                                <td>End of Shift</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>All Staff {{ HTML::image('uploads/images/small-tick.png') }}</td>
                                <td></td>
                                <td>Fortnightly</td>
                                <td>Start of Employment</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>As Required {{ HTML::image('uploads/images/small-tick.png') }}</td>
                                <td></td>
                            </tr>
                        </table>
                        <p></p>
                        <h4>Required Materials</h4>

                        <p>None</p>
                        <h4>Procedure</h4>
                        <ol>
                            <li>Read through all procedures and applicable forms listed in NTF023</li>
                            <li>The reference file containing all required information in form NTF023 and other
                                information
                                about
                                the restaurant can be found behind the bar.
                            </li>
                            <li>You will need a colleague to sign the form for you when you have undergone the training
                                with
                                them.
                                Some section you will undergo on your own so won’t require another to sign.
                            </li>
                            <li>This training can be completed up to 2 weeks after your start date.</li>
                            <li>Once completed sign and date the form and give to management. This confirms your
                                understanding
                                and
                                acceptance of everything contained within.
                            </li>


                        </ol>
                    </div>
                    <div class="panel-footer">
                        <table class="table">
                            <tr>
                                <th>Version</th>
                                <td>01</td>
                                <th>Last Amended</th>
                                <td>10/05/2014</td>
                                <th>Author</th>
                                <td>Geoff Whitehead</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!----------------------------------------------------------------------------------------------------------------------------------------------------------------->
                <div class="panel panel-default" id="p024">
                    <div class="panel-heading">
                        <div class="panel-title"><h3 id="024">NTP 024 : Cleaning Coffee Machine (Daily)</h3></div>
                    </div>
                    <div class="panel-body">


                        <h4>Purpose</h4>

                        <p>This procedure outlines the method to clean the coffee machine on a nightly basis</p>
                        <h4>Responsibilities</h4>
                        <table class="table">
                            <tr>
                                <th>Applies to</th>
                                <td> Front of House</td>
                                <th>To be completed</th>
                                <td>Daily</td>
                                <td>Start of Shift</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Kitchen</td>
                                <td></td>
                                <td>Weekly</td>
                                <td>End of Shift</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>All Staff {{ HTML::image('uploads/images/small-tick.png') }}</td>
                                <td></td>
                                <td>Fortnightly</td>
                                <td>Start of Employment</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>As Required {{ HTML::image('uploads/images/small-tick.png') }}</td>
                                <td></td>
                            </tr>
                        </table>
                        <p></p>
                        <h4>Required Materials</h4>

                        <p>Milk frother cleaner</p>
                        <h4>Procedure</h4>
                        <ol>
                            <li>If a cappuccino has been made in the night then pour a cap of cappuccino cleaner into a
                                glass
                                and
                                fill with water
                            </li>
                            <li>Press power button on the coffee machine (Skip to 3 if milk frother hasn’t been used)
                            </li>
                            <ol>
                                <li>If the machine says “clean cappuccino” then put the plastic tube for cappuccino into
                                    the
                                    glass
                                    of cleaning fluid.
                                </li>
                                <li>Then press the flashing button to start the cleaning process</li>
                                <ol>
                                    <li>Might ask you to empty tray: if so empty and return tray to continue process
                                    </li>
                                </ol>
                                <li>After about 10 seconds the machine will bleep and ask you to rinse / refill</li>
                                <li>Rinse glass and fill with cold water</li>
                                <li>Press the flashing button to continue cycle and flush tube</li>
                                <li>Once finished machine will power down</li>
                                <li>Remove tube from water clear glass away</li>
                            </ol>
                            <li>Machine powers off</li>
                            <ol>
                                <li>Remove drip and grounds container and rinse / clean / replace both</li>
                                <li>Wipe the front of the machine with a damp cloth</li>
                            </ol>
                        </ol>
                    </div>
                    <div class="panel-footer">
                        <table class="table">
                            <tr>
                                <th>Version</th>
                                <td>01</td>
                                <th>Last Amended</th>
                                <td>11/05/2014</td>
                                <th>Author</th>
                                <td>Geoff Whitehead</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!----------------------------------------------------------------------------------------------------------------------------------------------------------------->
                <div class="panel panel-default" id="p025">
                    <div class="panel-heading">
                        <div class="panel-title"><h3 id="025">NTP 025 : Using Cleaning Chemicals</h3></div>
                    </div>
                    <div class="panel-body">


                        <h4>Purpose</h4>

                        <p>This procedure outlines the dilutions and uses for all chemicals</p>
                        <h4>Responsibilities</h4>
                        <table class="table">
                            <tr>
                                <th>Applies to</th>
                                <td> Front of House</td>
                                <th>To be completed</th>
                                <td>Daily</td>
                                <td>Start of Shift</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Kitchen</td>
                                <td></td>
                                <td>Weekly</td>
                                <td>End of Shift</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>All Staff {{ HTML::image('uploads/images/small-tick.png') }}</td>
                                <td></td>
                                <td>Fortnightly</td>
                                <td>Start of Employment</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>As Required {{ HTML::image('uploads/images/small-tick.png') }}</td>
                                <td></td>
                            </tr>
                        </table>
                        <p></p>
                        <h4>Required Materials</h4>

                        <p>None</p>
                        <h4>Procedure</h4>
                        <ol>
                            <li>For all cleaning chemicals wear adequate PPE when using (Rubber gloves / eye glasses)
                            </li>
                            <li>When using any cleaning fluid refer chart below for dilutions.</li>
                            <li>When using any chemicals always refer to the attached labels / instructions and use
                                within these
                                guidelines.
                            </li>
                            <table class="table-striped">
                                <tr>
                                    <th>Chemical</th>
                                    <th>Use</th>
                                    <th>Dilution</th>
                                </tr>
                                <tr>
                                    <td>Glass cleaner</td>
                                    <td>Glass and chrome</td>
                                    <td>No dilution</td>
                                </tr>
                                <tr>
                                    <td>Kitchen cleaner / santizer</td>
                                    <td>Restaurant and kitchen spray bottles</td>
                                    <td>50ml per 600ml cold water in spray bottle</td>
                                </tr>
                                <tr>
                                    <td>Toilet bowl cleaner</td>
                                    <td>Toilets</td>
                                    <td>No dilution</td>
                                </tr>
                                <tr>
                                    <td>Foaming antibacterial cleaner</td>
                                    <td>Spray bottles for toilet surfaces and porcelain</td>
                                    <td>50ml per 600ml cold water in spray bottle</td>
                                </tr>
                                <tr>
                                    <td>Dishwasher glasswasher detergents</td>
                                    <td>Insert detergent (clear) tube through cap of bottle</td>
                                    <td>No dilution</td>
                                </tr>
                                <tr>
                                    <td>Dishwasher glasswasher rinse aid</td>
                                    <td>Insert rinse aid (blue) tube through cap of bottle</td>
                                    <td>No dilution</td>
                                </tr>
                                <tr>
                                    <td>Deepio floor cleaner</td>
                                    <td>Kitchen floor</td>
                                    <td>½ cup for full bucket of water</td>
                                </tr>
                            </table>

                        </ol>
                    </div>
                    <div class="panel-footer">
                        <table class="table">
                            <tr>
                                <th>Version</th>
                                <td>01</td>
                                <th>Last Amended</th>
                                <td>27/04/2014</td>
                                <th>Author</th>
                                <td>Geoff Whitehead</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!----------------------------------------------------------------------------------------------------------------------------------------------------------------->
                <div class="panel panel-default" id="p026">
                    <div class="panel-heading">
                        <div class="panel-title"><h3 id="026">NTP 026 : Polishing Glass / Cutlery</h3></div>
                    </div>
                    <div class="panel-body">


                        <h4>Purpose</h4>

                        <p>This procedure outlines how to properly polish glass and cutlery in the restaurant</p>
                        <h4>Responsibilities</h4>
                        <table class="table">
                            <tr>
                                <th>Applies to</th>
                                <td> Front of House</td>
                                <th>To be completed</th>
                                <td>Daily</td>
                                <td>Start of Shift</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Kitchen</td>
                                <td></td>
                                <td>Weekly</td>
                                <td>End of Shift</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>All Staff {{ HTML::image('uploads/images/small-tick.png') }}</td>
                                <td></td>
                                <td>Fortnightly</td>
                                <td>Start of Employment</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>As Required {{ HTML::image('uploads/images/small-tick.png') }}</td>
                                <td></td>
                            </tr>
                        </table>
                        <p></p>
                        <h4>Required Materials</h4>
                        <ul>
                            <li>White vinegar</li>
                            <li>Tea towel</li>
                            <li>Container for hot water</li>
                            <li>Kettle</li>
                        </ul>
                        <h4>Procedure</h4>
                        <ol>
                            <li>GLASSES</li>
                            <ol>
                                <li>If the glasses have just come out of the glass washer and are still hot</li>
                                <ol>
                                    <li>Use the blue tea towels to polish the rim/inside/outside of the glasses</li>
                                    <li>Check for lipstick and wash again if needed</li>
                                </ol>
                                <li>If the glasses have been stood for a while and gone cool</li>
                                <ol>
                                    <li>Fill a jug with boiling water</li>
                                    <li>Hold the glasses over the steam for a second before polishing with blue tea
                                        towel
                                    </li>
                                </ol>

                            </ol>
                            <li>CUTLERY</li>
                            <ol>
                                <li>Fill a wine bucket with boiling water and a splash of white vinegar and put all
                                    cutlery
                                    inside
                                </li>
                                <li>Use a red tea towel to pull out cutlery and polish</li>
                                <li>Move cutlery to cupboard at front</li>
                            </ol>
                        </ol>
                    </div>
                    <div class="panel-footer">
                        <table class="table">
                            <tr>
                                <th>Version</th>
                                <td>01</td>
                                <th>Last Amended</th>
                                <td>11/05/2014</td>
                                <th>Author</th>
                                <td>Geoff Whitehead</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!----------------------------------------------------------------------------------------------------------------------------------------------------------------->
                <div class="panel panel-default" id="p027">
                    <div class="panel-heading">
                        <div class="panel-title"><h3 id="027">NTP 027 : Taking an Order</h3></div>
                    </div>
                    <div class="panel-body">


                        <h4>Purpose</h4>

                        <p>This procedure outlines how to take an order with seat numbering</p>
                        <h4>Responsibilities</h4>
                        <table class="table">
                            <tr>
                                <th>Applies to</th>
                                <td> Front of House</td>
                                <th>To be completed</th>
                                <td>Daily</td>
                                <td>Start of Shift</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Kitchen</td>
                                <td></td>
                                <td>Weekly</td>
                                <td>End of Shift</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>All Staff {{ HTML::image('uploads/images/small-tick.png') }}</td>
                                <td></td>
                                <td>Fortnightly</td>
                                <td>Start of Employment</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>As Required {{ HTML::image('uploads/images/small-tick.png') }}</td>
                                <td></td>
                            </tr>
                        </table>
                        <p></p>
                        <h4>Required Materials</h4>

                        <p>Order pad</p>
                        <h4>Procedure</h4>

                            <ol>
                                <li>Prepare order before-hand by putting dashes on the order pad for the appropriate
                                    amount of
                                    people
                                    (refer to image).
                                </li>
                                <li>The reason for dashes is so that when you take the order any person can give you
                                    their order
                                    first rather than having to start at position 1 and work your way round the table
                                    (which
                                    isn’t
                                    always
                                    possible).
                                </li>
                                <li>Seat numbers are shown in the picture on the right. Note the position of the
                                    waitperson.
                                    Starting from the top right and moving clock-wise around the table.
                                </li>
                                <li>Most table’s orders are taken from the same position as there aren’t a lot of
                                    variations
                                    possible. If this isn’t the case make a note to let people know
                                </li>
                                <li>Positions run from top to bottom as shown in picture</li>
                                <li>Table number is noted in the bottom right</li>
                                <li>Rice should be a neat column on the right side so that other staff can quickly read
                                    the
                                    order.
                                </li>
                                <li>Order pads</li>
                                <ul>
                                    <li>White slip to Mains</li>
                                    <li>Pink slip to Starters</li>
                                    <li>Blue slip to front of house</li>
                                </ul>
                                <li>Learn the short hand for all the food</li>
                                <li>Seat numbers are especially important for large tables so waitpersons can quickly
                                    take the
                                    food
                                    out
                                    without asking customers what they ordered.
                                </li>

                            </ol>


                            {{ HTML::image('uploads/images/ntp027-1.jpg') }}
                            {{ HTML::image('uploads/images/ntp027-2.jpg') }}
                        </div>
                        <div class="panel-footer">
                            <table class="table">
                                <tr>
                                    <th>Version</th>
                                    <td>01</td>
                                    <th>Last Amended</th>
                                    <td>27/04/2014</td>
                                    <th>Author</th>
                                    <td>Geoff Whitehead</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <!----------------------------------------------------------------------------------------------------------------------------------------------------------------->
                    <div class="panel panel-default" id="p029">
                        <div class="panel-heading">
                            <div class="panel-title"><h3 id="029">NTP 029 : Age Verification Policy</h3></div>
                        </div>
                        <div class="panel-body">


                            <h4>Purpose</h4>

                            <p>This procedure outlines the policy regarding the restaurants challenge 25 age
                                verification policy</p>
                            <h4>Responsibilities</h4>
                            <table class="table">
                                <tr>
                                    <th>Applies to</th>
                                    <td> Front of House</td>
                                    <th>To be completed</th>
                                    <td>Daily</td>
                                    <td>Start of Shift</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Kitchen</td>
                                    <td></td>
                                    <td>Weekly</td>
                                    <td>End of Shift</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>All Staff {{ HTML::image('uploads/images/small-tick.png') }}</td>
                                    <td></td>
                                    <td>Fortnightly</td>
                                    <td>Start of Employment</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>As Required {{ HTML::image('uploads/images/small-tick.png') }}</td>
                                    <td></td>
                                </tr>
                            </table>
                            <p></p>
                            <h4>Required Materials</h4>

                            <p>None</p>
                            <h4>Procedure</h4>

                            <p>LICENSING (SCOTLAND) ACT 2005</p>

                            <p>AGE VERIFICATION POLICY STAFF DECLARATION</p>

                            <p>PREMISES AGE VERIFICATION POLICY</p>

                            <p>NAME AND ADDRESS OF PREMISES: Nadon Thai Restaurant, 12a Newgate St, Morpeth, NE611BA</p>

                            <p>The sale of alcohol to a child or young person (that is to say, a person aged under 18)
                                is an offence
                                which may lead to a fine of up to £5,000 and/or a term of imprisonment not exceeding
                                three months.
                                Such
                                a sale will also lead to a review of the premises license and could result in the
                                license being
                                suspended or revoked.</p>

                            <p>Suchittra Nadon / Geoff Whitehead operate an ‘age verification policy’, in terms of which
                                you must
                                require production of an acceptable proof-of-age document if you are in any doubt as to
                                whether a
                                person
                                seeking to buy alcohol is less than 25 years of age.</p>

                            <p>Only the following documents are acceptable for proof-of-age purposes:</p>


                            <ul>
                                <li>A passport</li>
                                <li>A European Union photo card driving license</li>
                                <li>A Ministry of Defense Form 90 (Defense Identity Card)</li>
                                <li>A photographic identity card bearing the national Proof of Age Standards Scheme
                                    (PASS)
                                    hologram
                                </li>
                                <li>A national identity card issued by a European Union member state (other than the
                                    United
                                    Kingdom),
                                    Norway, Iceland, Liechtenstein or Switzerland, or
                                </li>
                                <li>A Biometric Immigration Document.</li>
                            </ul>

                            <p>If no such document is produced or if you have a suspicion that the document presented is
                                not
                                genuine, or
                                has been tampered with or has been altered, then you must refuse the sale or refuse to
                                authorize the
                                sale.</p>

                            <p>Declaration:</p>

                            <p>I have read and understood the foregoing policy. I understand that failure to comply with
                                its terms
                                will
                                be treated as gross misconduct and may lead to my dismissal from my employment.</p>

                            <p>By completing the training procedure you are confirming your acceptance of this
                                procedure.</p>

                        </div>
                        <div class="panel-footer">
                            <table class="table">
                                <tr>
                                    <th>Version</th>
                                    <td>01</td>
                                    <th>Last Amended</th>
                                    <td>11/05/2014</td>
                                    <th>Author</th>
                                    <td>Geoff Whitehead</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <!----------------------------------------------------------------------------------------------------------------------------------------------------------------->
                    <div class="panel panel-default" id="p032">
                        <div class="panel-heading">
                            <div class="panel-title"><h3 id="032">NTP 032 : Taking an Email Reservation</h3></div>
                        </div>
                        <div class="panel-body">


                            <h4>Purpose</h4>

                            <p>To detail how to take an email reservation</p>
                            <h4>Responsibilities</h4>
                            <table class="table">
                                <tr>
                                    <th>Applies to</th>
                                    <td> Front of House</td>
                                    <th>To be completed</th>
                                    <td>Daily</td>
                                    <td>Start of Shift</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Kitchen</td>
                                    <td></td>
                                    <td>Weekly</td>
                                    <td>End of Shift</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>All Staff {{ HTML::image('uploads/images/small-tick.png') }}</td>
                                    <td></td>
                                    <td>Fortnightly</td>
                                    <td>Start of Employment</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>As Required {{ HTML::image('uploads/images/small-tick.png') }}</td>
                                    <td></td>
                                </tr>
                            </table>
                            <p></p>
                            <h4>Required Materials</h4>
                            <ul>
                                <li>iPad / computer with the email reservation client</li>
                                <li>Phone</li>
                                <li>Manager to take deposit if required</li>
                            </ul>
                            <p>None</p>
                            <h4>Procedure</h4>
                            <ol>
                                <li>Emails are received in the mail client on the restaurant iPad. Access them by
                                    pressing the mail
                                    icon
                                    located on the task bar
                                </li>
                                <li>Check email bookings periodically to be able to respond quickly. This means at the
                                    start, during
                                    and
                                    at the end of shifts before break.
                                </li>
                                <li>Take note of the date format when taking bookings to ensure correct date is entered
                                    in diary.
                                </li>
                                <li>Review booking and refer to manager / supervisor if booking is large and on a Friday
                                    /
                                    Saturday
                                </li>
                                <li>Firstly phone the customer to confirm when a table is available. Once the customer
                                    confirms and
                                    is
                                    booked in <strong>REPLY TO THEIR EMAIL WITH CONFIRMATION</strong> of the booking.
                                    This will also
                                    mean that other members of staff looking at the email client will see that someone
                                    has actioned
                                    this
                                    reservation and not try to contact the person twice or double book.
                                </li>
                                <li>Copy off the customers details into the reservation book noting that it’s an email
                                    reservation.
                                </li>
                                <li>If you cannot get In touch with the customer through the phone, reply to the email
                                    stating
                                    available
                                    times. Only put the reservation into the diary when sending a confirmation email or
                                    when a
                                    customer
                                    has confirmed a specific time.
                                </li>

                            </ol>
                        </div>
                        <div class="panel-footer">
                            <table class="table">
                                <tr>
                                    <th>Version</th>
                                    <td>02</td>
                                    <th>Last Amended</th>
                                    <td>26/06/2014</td>
                                    <th>Author</th>
                                    <td>Geoff Whitehead</td>
                                </tr>
                            </table>
                        </div>
                    </div>


                    <!----------------------------------------------------------------------------------------------------------------------------------------------------------------->
                    <div class="panel panel-default" id="p015">
                        <div class="panel-heading">
                            <div class="panel-title"><h3 id="015">NTP 015 : Holiday / Absence Requests</h3></div>
                        </div>
                        <div class="panel-body">


                            <h4>Purpose</h4>

                            <p>This procedure outlines how to submit a holiday request</p>
                            <h4>Responsibilities</h4>
                            <table class="table">
                                <tr>
                                    <th>Applies to</th>
                                    <td> Front of House</td>
                                    <th>To be completed</th>
                                    <td>Daily</td>
                                    <td>Start of Shift</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Kitchen</td>
                                    <td></td>
                                    <td>Weekly</td>
                                    <td>End of Shift</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>All Staff {{ HTML::image('uploads/images/small-tick.png') }}</td>
                                    <td></td>
                                    <td>Fortnightly</td>
                                    <td>Start of Employment</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>As Required {{ HTML::image('uploads/images/small-tick.png') }}</td>
                                    <td></td>
                                </tr>
                            </table>
                            <p></p>
                            <h4>Required Materials</h4>

                            <p>None</p>
                            <h4>Procedure</h4>
                            <ol>
                                <li>Fill in all the required information on the holiday request form and hand to
                                    management
                                </li>
                                <li>Please give at least 1-2 weeks notice, especially for multiple days</li>
                                <li>Manager will return form receipt to you with decision / alternative dates</li>
                                <li>Keep receipt as proof</li>

                            </ol>
                        </div>
                        <div class="panel-footer">
                            <table class="table">
                                <tr>
                                    <th>Version</th>
                                    <td>01</td>
                                    <th>Last Amended</th>
                                    <td>10/05/2014</td>
                                    <th>Author</th>
                                    <td>Geoff Whitehead</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <!----------------------------------------------------------------------------------------------------------------------------------------------------------------->
                    <div class="panel panel-default" id="p016">
                        <div class="panel-heading">
                            <div class="panel-title"><h3 id="016">NTP 016 : Reporting a Grievance</h3></div>
                        </div>
                        <div class="panel-body">


                            <h4>Purpose</h4>

                            <p>This procedure outlines the method to report a grievance</p>
                            <h4>Responsibilities</h4>
                            <table class="table">
                                <tr>
                                    <th>Applies to</th>
                                    <td>Front of House</td>
                                    <th>To be completed</th>
                                    <td>Daily</td>
                                    <td>Start of Shift</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Kitchen</td>
                                    <td></td>
                                    <td>Weekly</td>
                                    <td>End of Shift</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>All Staff {{ HTML::image('uploads/images/small-tick.png') }}</td>
                                    <td></td>
                                    <td>Fortnightly</td>
                                    <td>Start of Employment</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>As Required {{ HTML::image('uploads/images/small-tick.png') }}</td>
                                    <td></td>
                                </tr>
                            </table>
                            <p></p>
                            <h4>Required Materials</h4>

                            <p>None</p>
                            <h4>Procedure</h4>
                            <ol>
                                <li>Use the reporting form NTF017.</li>
                                <li>For use if you are unhappy with any member of staff or any general work related
                                    issue
                                </li>
                                <li>Fill out all the relevant sections</li>
                                <li>Contact Suchittra Nadon and hand this form to her personally or email to
                                    manager@nadonthai.co.uk
                                </li>

                            </ol>
                        </div>
                        <div class="panel-footer">
                            <table class="table">
                                <tr>
                                    <th>Version</th>
                                    <td>01</td>
                                    <th>Last Amended</th>
                                    <td>10/05/2014</td>
                                    <th>Author</th>
                                    <td>Geoff Whitehead</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <!----------------------------------------------------------------------------------------------------------------------------------------------------------------->
                    <div class="panel panel-default" id="p019">
                        <div class="panel-heading">
                            <div class="panel-title"><h3 id="019">NTP 019 : General Health & Safety at Workplace</h3>
                            </div>
                        </div>
                        <div class="panel-body">


                            <h4>Purpose</h4>

                            <p>This procedure outlines general health and safety issues. By completing your training you
                                are
                                confirming
                                you have read and understand this section.</p>
                            <h4>Responsibilities</h4>
                            <table class="table">
                                <tr>
                                    <th>Applies to</th>
                                    <td> Front of House</td>
                                    <th>To be completed</th>
                                    <td>Daily</td>
                                    <td>Start of Shift</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Kitchen</td>
                                    <td></td>
                                    <td>Weekly</td>
                                    <td>End of Shift</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>All Staff {{ HTML::image('uploads/images/small-tick.png') }}</td>
                                    <td></td>
                                    <td>Fortnightly</td>
                                    <td>Start of Employment</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>As Required {{ HTML::image('uploads/images/small-tick.png') }}</td>
                                    <td></td>
                                </tr>
                            </table>
                            <p></p>
                            <h4>Required Materials</h4>

                            <p>None</p>
                            <h4>Procedure</h4>
                            <ol>
                                <li>Reporting of injuries</li>
                                <ol>
                                    <li>Whenever you suffer a workplace injury you must fill out the relevant sections
                                        in the health
                                        and
                                        safety reporting book
                                    </li>
                                </ol>
                                <li>Reporting of near misses</li>
                                <ol>
                                    <li>Whenever an accident at work almost occurs or you see something that may cause
                                        or become a
                                        hazard; please notify a member of management as soon as possible using form
                                        NTF019.
                                    </li>
                                </ol>
                                <li>Using Chemicals</li>
                                <ol>
                                    <li>Whenever using any detergents and chemicals use the eyewear and gloves
                                        provided
                                    </li>
                                    <li>Use the correct dosage according to the labelling.</li>
                                </ol>
                                <li>Injuries</li>
                                <ol>
                                    <li>A first aid kit is located behind the kitchen door, this first aid kit will be
                                        regularly
                                        checked
                                        to ensure it has all the required supplies but if you notice any supplies
                                        running low please
                                        let
                                        a member of management know
                                    </li>
                                </ol>
                                <li>Reporting</li>

                                <ol>
                                    <li>All members of staff must report any of the following with the form provided
                                        (NTF019)
                                    </li>
                                    <ol>
                                        <li>If any hazards are noticed or near misses encountered</li>
                                        <li>Any damages to equipment or building that could affect health and safety
                                        </li>
                                        <li>Any damages to any PPE or safety equipment (fire of health)</li>
                                        <li>Any requirements/low stock of PPE or safety equipment</li>
                                        <li>Dangerous conditions</li>
                                    </ol>
                                </ol>
                                <li>Manual Handling</li>
                                <ol>
                                    <li>Refer to poster on manual handling located in store room when performing any
                                        lifting.
                                    </li>
                                </ol>

                            </ol>
                        </div>
                        <div class="panel-footer">
                            <table class="table">
                                <tr>
                                    <th>Version</th>
                                    <td>01</td>
                                    <th>Last Amended</th>
                                    <td>10/05/2014</td>
                                    <th>Author</th>
                                    <td>Geoff Whitehead</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <!----------------------------------------------------------------------------------------------------------------------------------------------------------------->
                    <div class="panel panel-default" id="p020">
                        <div class="panel-heading">
                            <div class="panel-title"><h3 id="020">NTP 020 : Specific Health & Safety Issues</h3></div>
                        </div>
                        <div class="panel-body">


                            <h4>Purpose</h4>

                            <p>This procedure outlines specific health and safety issues. By completing your training
                                you are
                                confirming
                                you have read and understand the below.</p>
                            <h4>Responsibilities</h4>
                            <table class="table">
                                <tr>
                                    <th>Applies to</th>
                                    <td> Front of House</td>
                                    <th>To be completed</th>
                                    <td>Daily</td>
                                    <td>Start of Shift</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Kitchen</td>
                                    <td></td>
                                    <td>Weekly</td>
                                    <td>End of Shift</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>All Staff {{ HTML::image('uploads/images/small-tick.png') }}</td>
                                    <td></td>
                                    <td>Fortnightly</td>
                                    <td>Start of Employment</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>As Required {{ HTML::image('uploads/images/small-tick.png') }}</td>
                                    <td></td>
                                </tr>
                            </table>
                            <p></p>
                            <h4>Required Materials</h4>

                            <p>None</p>
                            <h4>Procedure</h4>
                            <ol>
                                <li>Emptying Bins</li>
                                <ol>
                                    <li>Whenever you empty the bins first ensure that the stairwell is clear any hazards
                                        such as
                                        boxes
                                        or oil.
                                    </li>
                                    <li>If emptying bottles, first put the bottles in a big bag and make multiple trips.
                                        Get someone
                                        to
                                        help you lift the bags or bin if not too full.
                                    </li>
                                    <li>Clear any broken glass with the brushes provided</li>
                                    <li>Clear any spillages especially to stairway</li>
                                    <li>Refer to poster on manual handling located in store room</li>
                                </ol>
                                <li>Keeping stairs clean and free of obstructions</li>
                                <ol>
                                    <li>Don’t leave any rubbish/equipment around the stairwell to prevent trip hazards
                                    </li>
                                    <li>Clean any spillages immediately</li>
                                    <li>Use salt during the winter time prevent icing</li>
                                </ol>
                                <li>Using Chemicals</li>
                                <ol>
                                    <li>Whenever using any detergents and chemicals use the eyewear and gloves
                                        provided
                                    </li>
                                    <li>Use the correct dosage according to the labelling.</li>

                                </ol>
                                <li>Keeping store room tidy</li>
                                <ol>
                                    <li>Any boxes/stock must be put away on the shelves and not left; to prevent a trip
                                        hazard
                                    </li>
                                    <li>If you see anything causing a hazard notify management ASAP with NTF019</li>
                                    <li>Doors must be kept closed at all times</li>
                                </ol>
                                <li>Cleaning any spillages</li>
                                <ol>
                                    <li>Any spillages must be cleaned and floor dried straight away</li>
                                    <li>Use the yellow hazard signs whilst cleaning and leave afterwards until floor is
                                        completely
                                        dry
                                    </li>
                                    <li>Dry mop the floor so that it dries more quickly</li>
                                </ol>
                                <li>Reporting of any damages</li>
                                <ol>
                                    <li>Report any damages or broken equipment / PPE to management so replacements can
                                        be purchased.
                                        Regular checks of stock levels and visual checks will be done by management and
                                        purchase
                                        orders
                                        raised if necessary
                                    </li>
                                </ol>
                                <li>Wet weather</li>
                                <ol>
                                    <li>During wet weather put the hazard sign out at all times as the floors will be
                                        constantly
                                        wet.
                                    </li>
                                    <li>Regularly dry mop the floors to keep this under control</li>
                                </ol>
                                <li>Moving boxes</li>
                                <ol>
                                    <li>When moving boxes around, especially in store-room take multiple trips and refer
                                        to poster
                                        on
                                        manual handling located in the store room. Don’t carry too much at once and
                                        ensure corridor
                                        is
                                        free of hazards.
                                    </li>
                                </ol>
                            </ol>
                        </div>
                        <div class="panel-footer">
                            <table class="table">
                                <tr>
                                    <th>Version</th>
                                    <td>01</td>
                                    <th>Last Amended</th>
                                    <td>10/05/2014</td>
                                    <th>Author</th>
                                    <td>Geoff Whitehead</td>
                                </tr>
                            </table>
                        </div>
                    </div>


                    <!----------------------------------------------------------------------------------------------------------------------------------------------------------------->
                    <div class="panel panel-default" id="p021">
                        <div class="panel-heading">
                            <div class="panel-title"><h3 id="021">NTP 021 : Raising Requirements / Ordering</h3></div>
                        </div>
                        <div class="panel-body">


                            <h4>Purpose</h4>

                            <p>This procedure outlines how to raise any order requirements</p>
                            <h4>Responsibilities</h4>
                            <table class="table">
                                <tr>
                                    <th>Applies to</th>
                                    <td>Front of House</td>
                                    <th>To be completed</th>
                                    <td>Daily</td>
                                    <td>Start of Shift</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Kitchen</td>
                                    <td></td>
                                    <td>Weekly</td>
                                    <td>End of Shift</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>All Staff {{ HTML::image('uploads/images/small-tick.png') }}</td>
                                    <td></td>
                                    <td>Fortnightly</td>
                                    <td>Start of Employment</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>As Required {{ HTML::image('uploads/images/small-tick.png') }}</td>
                                    <td></td>
                                </tr>
                            </table>
                            <p></p>
                            <h4>Required Materials</h4>

                            <p>None</p>
                            <h4>Procedure</h4>

                            <p>Refer to contact details section to send orders</p>
                            <ol>
                                <li>For raising drinks order</li>
                                <ol>
                                    <li>Complete form NTF021-1 on Sunday</li>
                                </ol>
                                <li>For raising a dessert order</li>
                                <ol>
                                    Complete form NTF021-2 on Sunday or Wednesday or Thursday before 9:00pm</li>
                                </ol>
                                <li>For raising a cleaning supplies / H&S / First aid / Misc orders:</li>
                                <ol>
                                    <li>Complete form NTF021-3 any day of the week</li>
                                </ol>
                                <li>For raising restaurant dry goods / misc orders</li>
                                <ol>
                                    <li>Complete form NTF021-4 any day of the week.</li>
                                </ol>
                                <li>For other requirements:</li>
                                <ol>
                                    <li>Contact management:</li>
                                    <ol>
                                        <li>In person</li>
                                        <li>by email on morpeth.manager@nadonthai.co.uk</li>
                                        <li>by phone</li>
                                    </ol>
                                </ol>
                                <li>If relating to health and safety issues detailed in NTP019 or NTP020:</li>
                                <ol>
                                    <li>Submit form NTF019</li>
                                </ol>


                            </ol>
                        </div>
                        <div class="panel-footer">
                            <table class="table">
                                <tr>
                                    <th>Version</th>
                                    <td>01</td>
                                    <th>Last Amended</th>
                                    <td>10/05/2014</td>
                                    <th>Author</th>
                                    <td>Geoff Whitehead</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <!----------------------------------------------------------------------------------------------------------------------------------------------------------------->
                    <div class="panel panel-default" id="p022">
                        <div class="panel-heading">
                            <div class="panel-title"><h3 id="022">NTP 022 : End of Day (Till)</h3></div>
                        </div>
                        <div class="panel-body">


                            <h4>Purpose</h4>

                            <p></p>
                            <h4>Responsibilities</h4>
                            <table class="table">
                                <tr>
                                    <th>Applies to</th>
                                    <td> Front of House</td>
                                    <th>To be completed</th>
                                    <td>Daily</td>
                                    <td>Start of Shift</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Kitchen</td>
                                    <td></td>
                                    <td>Weekly</td>
                                    <td>End of Shift</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>All Staff {{ HTML::image('uploads/images/small-tick.png') }}</td>
                                    <td></td>
                                    <td>Fortnightly</td>
                                    <td>Start of Employment</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>As Required {{ HTML::image('uploads/images/small-tick.png') }}</td>
                                    <td></td>
                                </tr>
                            </table>
                            <p></p>
                            <h4>Required Materials</h4>

                            <p>None</p>
                            <h4>Procedure</h4>
                            <ol>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>

                            </ol>
                        </div>
                        <div class="panel-footer">
                            <table class="table">
                                <tr>
                                    <th>Version</th>
                                    <td>01</td>
                                    <th>Last Amended</th>
                                    <td>27/04/2014</td>
                                    <th>Author</th>
                                    <td>Geoff Whitehead</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <!----------------------------------------------------------------------------------------------------------------------------------------------------------------->
                    <div class="panel panel-default" id="p028">
                        <div class="panel-heading">
                            <div class="panel-title"><h3 id="028">NTP 028 : End of Day (Closing)</h3></div>
                        </div>
                        <div class="panel-body">


                            <h4>Purpose</h4>

                            <p>This procedure outlines a checklist to closing the restaurant in the evening</p>
                            <h4>Responsibilities</h4>
                            <table class="table">
                                <tr>
                                    <th>Applies to</th>
                                    <td> Front of House</td>
                                    <th>To be completed</th>
                                    <td>Daily</td>
                                    <td>Start of Shift</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Kitchen</td>
                                    <td></td>
                                    <td>Weekly</td>
                                    <td>End of Shift</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>All Staff {{ HTML::image('uploads/images/small-tick.png') }}</td>
                                    <td></td>
                                    <td>Fortnightly</td>
                                    <td>Start of Employment</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>As Required {{ HTML::image('uploads/images/small-tick.png') }}</td>
                                    <td></td>
                                </tr>
                            </table>
                            <p></p>
                            <h4>Required Materials</h4>

                            <p>None</p>
                            <h4>Procedure</h4>
                            <ol>
                                <li>Complete till reports</li>
                                <li>Staff to complete procedure for closing restaurant (NTP003)</li>
                                <li>Check dishwasher/glasswasher doors are left open and drained</li>
                                <li>Check microwaves and rice machine is OFF</li>
                                <li>Check Fryers are OFF</li>
                                <li>Check back door is closed</li>
                                <li>Check fridge/freezers are closed</li>
                                <li>Check hot cupboard has been switched OFF (plugs next to kitchen door at waist
                                    height)
                                </li>
                                <li>Check red switch next to kitchen door is OFF</li>
                                <li>Check all kitchen lights have been turned OFF</li>
                                <li>Check all windows in restaurant and toilets are closed</li>
                                <li>Till is OFF</li>
                                <li>Check all candles have been blown out</li>
                                <li>Both fridges are closed</li>
                                <li>Check all restaurant light have been turned OFF</li>
                                <li>Front external lights are OFF</li>
                                <li>Sign is brought in</li>
                                <li>Stairwell lights are OFF</li>
                                <li>Lock front door</li>

                            </ol>
                        </div>
                        <div class="panel-footer">
                            <table class="table">
                                <tr>
                                    <th>Version</th>
                                    <td>01</td>
                                    <th>Last Amended</th>
                                    <td>11/05/2014</td>
                                    <th>Author</th>
                                    <td>Geoff Whitehead</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <!----------------------------------------------------------------------------------------------------------------------------------------------------------------->
                    <div class="panel panel-default" id="p017">
                        <div class="panel-heading">
                            <div class="panel-title"><h3 id="017">NTP 017 : Taking a Deposit</h3></div>
                        </div>
                        <div class="panel-body">


                            <h4>Purpose</h4>

                            <p>This procedure outlines the method to take a deposit from a customer.</p>
                            <h4>Responsibilities</h4>
                            <table class="table">
                                <tr>
                                    <th>Applies to</th>
                                    <td>Front of House</td>
                                    <th>To be completed</th>
                                    <td>Daily</td>
                                    <td>Start of Shift</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Kitchen</td>
                                    <td></td>
                                    <td>Weekly</td>
                                    <td>End of Shift</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>All Staff {{ HTML::image('uploads/images/small-tick.png') }}</td>
                                    <td></td>
                                    <td>Fortnightly</td>
                                    <td>Start of Employment</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>As Required {{ HTML::image('uploads/images/small-tick.png') }}</td>
                                    <td></td>
                                </tr>
                            </table>
                            <p></p>
                            <h4>Required Materials</h4>

                            <p>None</p>
                            <h4>Procedure</h4>
                            <ol>
                                <li><strong>Please refer bookings that require a deposit to management /
                                        supervisor</strong></li>
                                <li>For bookings over 10 people on a Friday or Saturday night or other special
                                    occasions.
                                </li>
                                <li>Let customer know that:</li>
                                <ol>
                                    <li>A deposit of £5 per head is required to confirm the reservation. This can be
                                        paid by:
                                    </li>
                                    <ol>
                                        <li>Card over the phone or in person</li>
                                        <li>Cheque</li>
                                        <li>Cash</li>
                                        <li>Deposits are refundable up to 24 hours prior to booking when cancelling
                                            reservation
                                        </li>
                                    </ol>
                                </ol>
                                <li>Fill out all sections on form NTF017 and note the amount of deposit paid and your
                                    initials next
                                    to
                                    the reservation in the book.
                                </li>
                                <li><strong>Till</strong></li>
                                <li>When a customer is paying for a deposit use the deposit button on the till.</li>
                                <ol>
                                    <li>Press the deposit button on a clear screen not on a track (table)</li>
                                    <li>Type “dep” then enter</li>
                                    <li>Key in the deposit amount and then press the payment method.</li>
                                    <li>Immediately press print bill then clerk 1 after this before doing anything else
                                        to print
                                        receipt.
                                    </li>
                                    <ol>
                                        <li>If this step is missed you will need to access the EJF located in X key to
                                            manually
                                            print
                                            receipts.
                                        </li>
                                    </ol>
                                    <li>Print out 2 receipts</li>
                                    <ol>
                                        <li>Give one to the customer or staple into diary if customer not present</li>
                                        <li>Put one in till writing the name and date of the reservation on the
                                            receipt.
                                        </li>
                                    </ol>
                                </ol>
                                <li>When applying deposit to a customer’s bill:</li>
                                <ol>
                                    <li>Use the “apply deposit” button and key in the deposit amount on a customer’s
                                        bill (can be
                                        done
                                        at any time so can do at the start of the meal so it’s not forgotten later (till
                                        will show
                                        negative amount initially when this is done)
                                    </li>
                                </ol>
                            </ol>
                        </div>
                        <div class="panel-footer">
                            <table class="table">
                                <tr>
                                    <th>Version</th>
                                    <td>01</td>
                                    <th>Last Amended</th>
                                    <td>10/05/2014</td>
                                    <th>Author</th>
                                    <td>Geoff Whitehead</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <!----------------------------------------------------------------------------------------------------------------------------------------------------------------->
                    <div class="panel panel-default" id="p030">
                        <div class="panel-heading">
                            <div class="panel-title"><h3 id="030">NTP 030 : Taking Payments over the Phone</h3></div>
                        </div>
                        <div class="panel-body">


                            <h4>Purpose</h4>

                            <p>This procedure outlines how to take a card payment over the phone. Generally used for
                                taking deposit
                                payment. You must ensure that you fill out necessary sections in form NTF017 when taking
                                deposit
                                payments.</p>
                            <h4>Responsibilities</h4>
                            <table class="table">
                                <tr>
                                    <th>Applies to</th>
                                    <td> Front of House</td>
                                    <th>To be completed</th>
                                    <td>Daily</td>
                                    <td>Start of Shift</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Kitchen</td>
                                    <td></td>
                                    <td>Weekly</td>
                                    <td>End of Shift</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>All Staff {{ HTML::image('uploads/images/small-tick.png') }}</td>
                                    <td></td>
                                    <td>Fortnightly</td>
                                    <td>Start of Employment</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>As Required {{ HTML::image('uploads/images/small-tick.png') }}</td>
                                    <td></td>
                                </tr>
                            </table>
                            <p></p>
                            <h4>Required Materials</h4>

                            <ul>
                                <li>Card Machine</li>
                                <li>Manager must complete this as access code is required to complete.</li>
                            </ul>
                            <h4>Procedure</h4>
                            <ol>
                                <li>Press MENU</li>
                                <li>Press F1 for MAILORDER</li>
                                <li>Press F4 for SALE</li>
                                <li>It will now prompt for customer’s card number. Ask customer for the long card number
                                    on their
                                    card
                                    and enter this here followed by the green enter button.
                                </li>
                                <li>Enter expiry date of the card followed by the green button</li>
                                <li>Enter the CSC which is the last 3 digits on the signature strip followed by the
                                    green button
                                </li>
                                <li>Enter the numbers of the persons postcode (ie DH1 4PR = 14) followed by green
                                    button
                                </li>
                                <li>Enter the house number followed by the green button (if no house number leave
                                    blank)
                                </li>
                                <li>Enter the SALE amount and proceed as normal.</li>
                            </ol>
                        </div>
                        <div class="panel-footer">
                            <table class="table">
                                <tr>
                                    <th>Version</th>
                                    <td>01</td>
                                    <th>Last Amended</th>
                                    <td>26/06/2014</td>
                                    <th>Author</th>
                                    <td>Geoff Whitehead</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <!----------------------------------------------------------------------------------------------------------------------------------------------------------------->

                    <div class="panel panel-default" id="p005">
                        <div class="panel-heading">
                            <div class="panel-title"><h3 id="005">NTP 005 : Cleaning Coffee Machine</h3></div>
                        </div>
                        <div class="panel-body">


                            <h4>Purpose</h4>

                            <p></p>
                            <h4>Responsibilities</h4>
                            <table class="table">
                                <tr>
                                    <th>Applies to</th>
                                    <td> Front of House</td>
                                    <th>To be completed</th>
                                    <td>Daily</td>
                                    <td>Start of Shift</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Kitchen</td>
                                    <td></td>
                                    <td>Weekly</td>
                                    <td>End of Shift</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>All Staff {{ HTML::image('uploads/images/small-tick.png') }}</td>
                                    <td></td>
                                    <td>Fortnightly</td>
                                    <td>Start of Employment</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>As Required {{ HTML::image('uploads/images/small-tick.png') }}</td>
                                    <td></td>
                                </tr>
                            </table>
                            <p></p>
                            <h4>Required Materials</h4>

                            <p>None</p>
                            <h4>Procedure</h4>
                            <ol>
                                <li>If the display on the coffee machine says cleaning required continue.</li>
                                <ul>
                                    <li>If this is not a convenient time then turn the rotating dial until it says No
                                        and press
                                        center
                                        button
                                    </li>
                                </ul>
                                <li>Press the flashing button to confirm start cleaning. (machine will operate)</li>
                                <li>Display may ask you to empty grounds or tray.</li>
                                <ul>
                                    <li>If yes, empty the trays, reinsert and press flashing button.</li>
                                </ul>
                                <li>“Display will then ask you to insert cleaning tablet”.</li>
                                <li>Open hatch at top of machine where you insert ground coffee (what you use for decaf
                                    coffee).
                                    DROP 1
                                    CLEANING TABLET IN. (NOT THE SQUARE DECALC TABLETS)
                                </li>
                                <li>Press the flashing button</li>
                                <li>Machine will now run for about 20 minutes.</li>
                                <li>Display will then ask you to empty trays again.</li>
                                <ul>
                                    <li>Empty trays and press flashing button</li>
                                </ul>
                                <li>Machine will rinse again and finish cleaning cycle.</li>
                            </ol>
                        </div>
                        <div class="panel-footer">
                            <table class="table">
                                <tr>
                                    <th>Version</th>
                                    <td>01</td>
                                    <th>Last Amended</th>
                                    <td>10/05/2014</td>
                                    <th>Author</th>
                                    <td>Geoff Whitehead</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <!----------------------------------------------------------------------------------------------------------------------------------------------------------------->
                    <div class="panel panel-default" id="p006">
                        <div class="panel-heading">
                            <div class="panel-title"><h3 id="006">NTP 006 : Descaling Coffee Machine</h3></div>
                        </div>
                        <div class="panel-body">


                            <h4>Purpose</h4>

                            <p>This procedure outlines the method to de-scale the coffee machine.</p>
                            <h4>Responsibilities</h4>
                            <table class="table">
                                <tr>
                                    <th>Applies to</th>
                                    <td> Front of House</td>
                                    <th>To be completed</th>
                                    <td>Daily</td>
                                    <td>Start of Shift</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Kitchen</td>
                                    <td></td>
                                    <td>Weekly</td>
                                    <td>End of Shift</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>All Staff {{ HTML::image('uploads/images/small-tick.png') }}</td>
                                    <td></td>
                                    <td>Fortnightly</td>
                                    <td>Start of Employment</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>As Required {{ HTML::image('uploads/images/small-tick.png') }}</td>
                                    <td></td>
                                </tr>
                            </table>
                            <p></p>
                            <h4>Required Materials</h4>

                            <p>Descaling tablets.</p>
                            <h4>Procedure</h4>
                            <ol>
                                <li>This process will take about 40 minutes to complete so ensure you have enough time
                                    available
                                </li>
                                <li>First fill a water jug full of cold water (about 800ml) and insert 3 jura descaling
                                    tablets
                                    letting
                                    them dissolve whilst you continue.
                                </li>
                                <li>The display on the coffee machine says decalcs required. Press the flashing button
                                    once.
                                </li>
                                <li>Display will prompt to empty tray and grounds container. Do this then press flashing
                                    button.
                                </li>
                                <ol>
                                    <li>Display might say “insert tray” when you have inserted, usually this is because
                                        the silver
                                        metal
                                        contacts on the back of the tray are wet. Dry them.
                                    </li>
                                </ol>
                                <li>Display says “insert tablet decalcs/cleaning”.</li>
                                <ol>
                                    <li>Take out the water holder and pour away any water inside.</li>
                                    <li>If the tablets have fully dissolved pour the water into the water holder.</li>
                                    <li>Put the water holder back into the coffee machine.</li>
                                    <li>Press the flashing button to continue.</li>
                                </ol>
                                <li>After pressing button the machine should now be running the decalcs cycle which will
                                    take about
                                    40
                                    minutes to complete.
                                </li>
                                <li>... ... ...</li>
                                <li>Display says “empty tray”</li>
                                <ol>
                                    <li>Empty trays and reinsert</li>
                                    <li>Press flashing button</li>
                                </ol>
                                <li>Display says “rinse / refill container”</li>
                                <ol>
                                    <li>Remove water container and wash out the cleaning fluid / rinse / refill with
                                        cold water then
                                        reinsert into machine
                                    </li>
                                    <li>Press flashing button</li>
                                </ol>
                                <li>Display says “empty tray”</li>
                                <ol>
                                    <li>Empty trays and reinsert</li>
                                    <li>Press flashing button</li>
                                </ol>
                                <li>Cleaning cycle should now have finished. Make one coffee to test and put milk in. If
                                    milk
                                    curdles
                                    then machine hasn’t been cleaned properly and solution is still remaining in system.
                                </li>
                            </ol>
                        </div>
                        <div class="panel-footer">
                            <table class="table">
                                <tr>
                                    <th>Version</th>
                                    <td>01</td>
                                    <th>Last Amended</th>
                                    <td>27/04/2014</td>
                                    <th>Author</th>
                                    <td>Geoff Whitehead</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <!----------------------------------------------------------------------------------------------------------------------------------------------------------------->
                    <div class="panel panel-default" id="p031">
                        <div class="panel-heading">
                            <div class="panel-title"><h3 id="031">NTP 031 : Stock Checking</h3></div>
                        </div>
                        <div class="panel-body">


                            <h4>Purpose</h4>

                            <p>This procedure outlines how to perform a stock check. Once completed this needs to be
                                passed to
                                management.</p>
                            <h4>Responsibilities</h4>
                            <table class="table">
                                <tr>
                                    <th>Applies to</th>
                                    <td> Front of House</td>
                                    <th>To be completed</th>
                                    <td>Daily</td>
                                    <td>Start of Shift</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Kitchen</td>
                                    <td></td>
                                    <td>Weekly</td>
                                    <td>End of Shift</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>All Staff {{ HTML::image('uploads/images/small-tick.png') }}</td>
                                    <td></td>
                                    <td>Fortnightly</td>
                                    <td>Start of Employment</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>As Required {{ HTML::image('uploads/images/small-tick.png') }}</td>
                                    <td></td>
                                </tr>
                            </table>
                            <p></p>
                            <h4>Required Materials</h4>

                            <p>None</p>
                            <h4>Procedure</h4>
                            <ol>
                                <li>Use the drinks order sheet NTF-021.</li>
                                <li>Write down the exact quantities of all stock excluding spirits (these are done
                                    separately)
                                </li>
                                <li>Include all stock in fridges and in the store room.</li>
                                <li>Once completed print report from till:</li>
                                <ol>
                                    <li>Turn key to z1 position and logon (same position as day sales report)</li>
                                    <li>Press on full sequential report</li>
                                    <li>Enter 170 as first PLU and press ENTER</li>
                                    <li>Enter 400 as last PLU and press ENTER</li>
                                    <li>Print report</li>
                                    <li>Staple this to the stock form</li>
                                    <li>Hand to management with daily reports</li>
                                </ol>
                            </ol>
                        </div>
                        <div class="panel-footer">
                            <table class="table">
                                <tr>
                                    <th>Version</th>
                                    <td>01</td>
                                    <th>Last Amended</th>
                                    <td>15/08/2014</td>
                                    <th>Author</th>
                                    <td>Geoff Whitehead</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    @endif
                </div
            </div>











            @if (Session::get('sid') == 2)
                <p>procedures for durham go here</p>
            @endif


    </div>
    </div>
<script>
    $(document).ready(function () {
        document.getElementById('#p001').focus();
    }
</script>
