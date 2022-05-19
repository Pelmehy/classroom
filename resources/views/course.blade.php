@extends('layouts.app')

@section('title-block')
    Курс
@endsection

@section('content')

    <div class="row g-5">

{{--        calendar--}}
        <div class="col-md-5 col-lg-4 order-md-last">
            <div class="calendar col-8">
                <div class="calendar__opts">
                    <select name="calendar__month" id="calendar__month" class="w-45p">
                        <option>Jan</option>
                        <option>Feb</option>
                        <option>Mar</option>
                        <option>Apr</option>
                        <option selected>May</option>
                        <option>Jun</option>
                        <option>Jul</option>
                        <option>Aug</option>
                        <option>Sep</option>
                        <option>Oct</option>
                        <option>Nov</option>
                        <option>Dec</option>
                    </select>

                    <select name="calendar__year" id="calendar__year" class="w-45p">
                        <option>2017</option>
                        <option>2018</option>
                        <option>2019</option>
                        <option selected>2020</option>
                    </select>
                </div>

                <div class="calendar__body">
                    <div class="calendar__days">
                        <div>M</div>
                        <div>T</div>
                        <div>W</div>
                        <div>T</div>
                        <div>F</div>
                        <div>S</div>
                        <div>S</div>
                    </div>

                    <div class="calendar__dates">
                        <div class="calendar__date calendar__date--grey"><span>27</span></div>
                        <div class="calendar__date calendar__date--grey"><span>28</span></div>
                        <div class="calendar__date calendar__date--grey"><span>29</span></div>
                        <div class="calendar__date calendar__date--grey"><span>30</span></div>
                        <div class="calendar__date"><span>1</span></div>
                        <div class="calendar__date"><span>2</span></div>
                        <div class="calendar__date"><span>3</span></div>
                        <div class="calendar__date"><span>4</span></div>
                        <div class="calendar__date"><span>5</span></div>
                        <div class="calendar__date"><span>6</span></div>
                        <div class="calendar__date"><span>7</span></div>
                        <div class="calendar__date"><span>8</span></div>
                        <div class="calendar__date"><span>9</span></div>
                        <div class="calendar__date"><span>10</span></div>
                        <div class="calendar__date"><span>11</span></div>
                        <div class="calendar__date"><span>12</span></div>
                        <div class="calendar__date"><span>13</span></div>
                        <div class="calendar__date"><span>14</span></div>
                        <div class="calendar__date"><span>15</span></div>
                        <div class="calendar__date calendar__date--selected calendar__date--first-date calendar__date--range-start"><span>16</span></div>
                        <div class="calendar__date calendar__date--selected calendar__date--last-date"><span>17</span></div>
                        <div class="calendar__date calendar__date--selected calendar__date--first-date"><span>18</span></div>
                        <div class="calendar__date calendar__date--selected"><span>19</span></div>
                        <div class="calendar__date calendar__date--selected"><span>20</span></div>
                        <div class="calendar__date calendar__date--selected calendar__date--last-date calendar__date--range-end"><span>21</span></div>
                        <div class="calendar__date"><span>22</span></div>
                        <div class="calendar__date"><span>23</span></div>
                        <div class="calendar__date"><span>24</span></div>
                        <div class="calendar__date"><span>25</span></div>
                        <div class="calendar__date"><span>26</span></div>
                        <div class="calendar__date"><span>27</span></div>
                        <div class="calendar__date"><span>28</span></div>
                        <div class="calendar__date"><span>29</span></div>
                        <div class="calendar__date"><span>30</span></div>
                        <div class="calendar__date"><span>31</span></div>
                    </div>
                </div>
            </div>
            <div class="schedule col-8 text-center">
                <h4 class="">Немає завдань</h4>
                <hr>
            </div>
            <div class="schedule col-8">
                <h4>Завдання 1</h4>
            </div>
        </div>
{{--        calendar--}}
        <div class="col-md-7 col-lg-8">
            <div class="tasks d-flex text-muted pt-3">
                <div class="ico flex-shrink-0 me-2"></div>
                <p class="pb-3 mb-0 small">
                    Some representative placeholder content, with some information about this user. Imagine this being some sort of status update, perhaps?
                </p>
            </div>
            <div class="tasks d-flex text-muted pt-3">
                <div class="ico flex-shrink-0 me-2"></div>
                <p class="pb-3 mb-0 small">
                    Some representative placeholder content, with some information about this user. Imagine this being some sort of status update, perhaps?
                </p>
            </div>
            <div class="tasks d-flex text-muted pt-3">
                <div class="ico flex-shrink-0 me-2"></div>
                <p class="pb-3 mb-0 small">
                    Some representative placeholder content, with some information about this user. Imagine this being some sort of status update, perhaps?
                </p>
            </div>

        </div>
    </div>

@endsection
