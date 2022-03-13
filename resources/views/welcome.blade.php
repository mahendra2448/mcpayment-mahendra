<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
            input {
                margin: 5px 0;
                padding: 5px 10px;
                border-radius: 7px;
            }
            .sum-results {
                color: #414243;
                background: #fafafa;
            }
            table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                margin-top: 1.5rem;
                width: 80%;
            }
            td, th {
                border: 1px solid lightsteelblue;
                padding: 3px 5px;
            }
            th {
                background: #4a5568;
                text-align: center;
            }
            tr:hover {
                background-color: #4a5568;
            }
            a:hover {
                color: aquamarine;
                transition: all .2s;
            }
            #alert small, #alert-budget small {
                font-weight: 800;
                padding: 5px 15px;
            }
        </style>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div class="p-6">
                            <div class="flex items-center">
                                <a id="two-sums" href="!#" class="underline title text-gray-900 dark:text-white">Two Sums</a>
                            </div>

                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                Input the <strong>Target</strong> number. <br>
                                Input the other numbers to be sum and cannot over the <strong>Target</strong> number.
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                            <div class="flex items-center">
                                <a href="!#" class="underline title text-gray-900 dark:text-white">Budget App</a>
                            </div>

                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                <strong>Budget App</strong> will calculate your account balance based on your income and expenses.
                            </div>
                        </div>

                    </div>
                </div>
                <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                    <div class="ml-4 text-right text-sm text-gray-500 sm:ml-0">
                        by <a href="https://mahendra.page" target="_blank">Mahendra</a>
                    </div>
                </div>
                
                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="grid grid-cols-1">
                        <div class="p-6">
                            <strong id="title" class="text-lg text-gray-900 dark:text-white"></strong>

                            <div id="twosums-section" hidden>
                                <input type="number" placeholder="Target" id="target">
                                <a id="submit-target" href="#" class="underline dark:text-white">Submit</a>
                                <a id="reset" href="#" style="color:lightseagreen" class="underline">Reset</a><br>
                                
                                <div class="array-numbers" hidden>
                                    <input type="text" placeholder="Input array number" id="numbers" pattern="[0-9]*[,]">
                                    <a id="submit-numbers" href="#" class="underline dark:text-white">Submit</a><br>
                                </div>
                                <div id="alert"></div>
                                
                                <div class="sum-results" hidden>
                                    <pre id="res-target"></pre>
                                    <pre id="res-numbers"></pre>
                                    <pre id="res-output"></pre>
                                </div>
                            </div>
                            
                            <div id="budget-section" hidden>
                                <a href="" class="input-choice underline dark:text-white" data-type="income">Income</a>
                                <a href="" class="input-choice underline dark:text-white" data-type="expense">Expense</a>
                                <a href="" class="input-choice underline" style="color:lightseagreen" data-type="reset">Reset</a>
                                <br>

                                <div id="income-input" hidden>
                                    <input type="number" placeholder="Input your income" id="income">
                                    <a id="submit-income" href="#" class="underline dark:text-white">Submit</a><br>
                                </div>

                                <div id="ex-input" hidden>
                                    <input type="number" placeholder="Input your expense" id="expense">
                                    <a id="submit-expense" href="#" class="underline dark:text-white">Submit</a><br>
                                </div>
                                <div id="alert-budget"></div>

                                <table class="dark:text-white" hidden>
                                    <tr>
                                        <th>Details</th>
                                        <th>Debits</th>
                                        <th>Credits</th>
                                        <th>Balance</th>
                                        <th>Date</th>
                                    </tr>
                                    <tbody id="budget">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(function() {
                var currency = new Intl.NumberFormat();
                function formatDate(date) {
                    var d = new Date(date),
                        month = '' + (d.getMonth() + 1),
                        day = '' + d.getDate(),
                        year = d.getFullYear();
                    if (month.length < 2) month = '0' + month;
                    if (day.length < 2) day = '0' + day;
                    return [year, month, day].join('-');
                }

                $('a.title').on('click', function(e) {
                    e.preventDefault()
                    var title = $(this).html()
                    $('#title').html(title)

                    if (title == 'Two Sums') {
                        $('#twosums-section').show()
                        $('#budget-section').hide()
                        twoSums()
                    } else {
                        $('#twosums-section').hide()
                        $('#budget-section').show()
                        budgetApp()
                    }
                })

                function twoSums() {
                    var target
                    $('a#submit-target').on('click', function(e) {
                        e.preventDefault()
                        var dis = $(this)
                        target = $('input#target').val()

                        if (target > 500 || target == '') {
                            $('#alert').html('<small style="background:white;color:red;">Target cannot empty/over 500!</small>')
                        } else {
                            dis.hide()
                            $('input#target').hide()
                            $('div.array-numbers').show()
                            $('#alert').html('<small style="background:white;color:green;">Tips: Split number with comma</small>')
                        }
                    })
                    $('a#submit-numbers').on('click', function(e) {
                        var inputs = $('input#numbers').val()
                        const inputed = inputs.replace(/[^\d,]/g,'').split(',')
                        const arrayNums = [...new Set(inputed)]
                        const out = []

                        for (let i=0; i<arrayNums.length; i++) {
                            var sec = String(target-arrayNums[i])
                            
                            if (arrayNums.indexOf(sec) != arrayNums.indexOf(arrayNums[i]) && arrayNums.indexOf(sec) != '-1') {
                                const item = [i,arrayNums.indexOf(sec)]
                                out.push(String(item.sort()))
                            }
                        }
                        const filtered = [...new Set(out)];
                        const results  = filtered.map(fil => {
                            const arr = fil.split(',')
                            const res = arr.map(a => {
                                return Number(a)
                            })
                            return res
                        })

                        $('.sum-results').show()
                        $('#res-target').html('Target: '+target)
                        $('#res-numbers').html('Array: ['+arrayNums+']')
                        $('#res-output').html('Result: '+JSON.stringify(results))
                    })
                    $('a#reset').on('click', function(e) {
                        e.preventDefault()
                        $('#alert').html('')
                        $('.sum-results').hide()
                        $('input#target').show()
                        $('input#numbers').val('')
                        $('a#submit-target').show()
                        $('div.array-numbers').hide()
                    })
                }
                function budgetApp() {
                    var balance

                    $('a.input-choice').on('click', function(e) {
                        e.preventDefault()
                        var type = $(this).data('type')
                        $('#alert-budget').html('')
                        if (type == 'income') {
                            $('div#income-input').show()
                            $('div#ex-input').hide()
                        } else if (type == 'expense'){
                            $('div#income-input').hide()
                            $('div#ex-input').show()
                        } else {
                            $.get('/api/reset', function(res) {
                                if (res.state != 'success') {
                                    $('#alert-budget').html('<small style="background:white;color:red;padding:0 5px">'+res.msg +'</small>')
                                } else {
                                    $('table').hide()
                                    $('#alert-budget').html('<small style="background:white;color:green;padding:0 5px">'+res.msg +'</small>')
                                }
                            })
                        }

                    })
                    $('a#submit-income').on('click', function(e) {
                        e.preventDefault()
                        var dis = $(this)
                        value = $('input#income').val()

                        $.post('/api/add-debit', {income: value}, function(res) {
                            if (res.state != 'success') {
                                $('#alert-budget').html('<small style="background:white;color:red;">'+res.msg +'</small>')
                            } else {
                                var results
                                $('#alert-budget').html('<small style="background:white;color:green;">'+res.msg +'</small>')
                                $('table').show()
                                
                                for (let i=0; i<res.data.length; i++) {
                                    var color = (res.data[i].details == 'Expense') ? 'color:lightcoral;' : 'color:lightseagreen;';

                                    results += "<tr><td width='25%'>"+res.data[i].details+"</td><td style='text-align:right'>"+currency.format(res.data[i].debits)+"</td><td style='text-align:right'>"+currency.format(res.data[i].credits)+"</td><td style='text-align:right;font-weight:bold;"+color+"'>"+currency.format(res.data[i].balance)+"</td><td style='text-align:center' width='15%'>"+formatDate(res.data[i].created_at)+"</td></tr>"
                                }
                                $('tbody#budget').html(results)
                            }
                        })
                    })
                    $('a#submit-expense').on('click', function(e) {
                        e.preventDefault()
                        var dis = $(this)
                        value = $('input#expense').val()

                        $.post('/api/add-credit', {expense: value}, function(res) {
                            if (res.state != 'success') {
                                $('#alert-budget').html('<small style="background:white;color:red;">'+res.msg +'</small>')
                            } else {
                                var results
                                $('#alert-budget').html('<small style="background:white;color:green;">'+res.msg +'</small>')
                                $('table').show()

                                for (let i=0; i<res.data.length; i++) {
                                    var color = (res.data[i].details == 'Expense') ? 'color:lightcoral;' : 'color:lightseagreen;';

                                    results += "<tr><td width='25%'>"+res.data[i].details+"</td><td style='text-align:right'>"+currency.format(res.data[i].debits)+"</td><td style='text-align:right'>"+currency.format(res.data[i].credits)+"</td><td style='text-align:right;font-weight:bold;"+color+"'>"+currency.format(res.data[i].balance)+"</td><td style='text-align:center' width='15%'>"+formatDate(res.data[i].created_at)+"</td></tr>"
                                }
                                $('tbody#budget').html(results)
                            }
                        })
                    })
                }
            })
        </script>
    </body>
</html>
