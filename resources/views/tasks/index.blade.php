<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700&display=swap');

        * { margin: 0; padding: 0; box-sizing: border-box; }

        :root {
              --crimson:  #7f1d1d;
               --red:      #991b1b;
                --rose:     #b91c1c;
               --light:    #fee2e2;
               --muted:    #fecaca;
              --dark:     #450a0a;
             --text:     #1c0606;
             --bg:       #fff5f5;
              --card:     #ffffff;
            --border:   #fecaca;
             --sub:      #9b2c2c;
      }

        body {
              font-family: 'Nunito', sans-serif;
            background: var(--bg);
              color: var(--text);
            min-height: 100vh;
              display: grid;
             grid-template-rows: 60px 1fr;
                }

        
        .header {
               background: var(--dark);
              padding: 0 32px;
             display: flex;
             align-items: center;
            justify-content: space-between;
          }
 
        .header-left {
             display: flex;
            align-items: center;
            gap: 12px;
                 }

        .logo {
             width: 36px; height: 36px;
            background: var(--rose);
            border-radius: 10px;
            display: flex;
             align-items: center;
             justify-content: center;
            color: #fff;
        }

        .app-name {
        font-size: 15px;
              font-weight: 700;
             color: #fff;
            letter-spacing: 0.3px;
          } 

               .header-right {
            display: flex;
            align-items: center;
             gap: 14px;
       }

        .header-date {
            font-size: 12px;
            color: #fca5a5;
        }

      .btn-new {
                display: inline-flex;
                  align-items: center;
            gap: 7px;
               background: var(--rose);
                 color: white;
            padding: 8px 16px;
              border-radius: 8px;
              font-size: 13px;
                font-weight: 600;
            text-decoration: none;
            font-family: inherit;
            transition: background 0.15s;
                 }
        .btn-new:hover { background: #991b1b; }

      
        .body {
            display: grid;
                grid-template-columns: 220px 1fr;
            min-height: 0;
         }

        
        .panel {
                background: var(--dark);
            padding: 28px 16px;
              border-right: 1px solid #7f1d1d;
             }

        .panel-label {
                font-size: 10px;
            font-weight: 700;
                color: #fca5a5;
                  text-transform: uppercase;
               letter-spacing: 1px;
             margin-bottom: 16px;
             }

        .stat-item {
             display: flex;
            align-items: center;
                justify-content: space-between;
             padding: 10px 12px;
             border-radius: 8px;
             margin-bottom: 6px;
             background: #3b0d0d;
        }

        .stat-item-left {
            display: flex;
            align-items: center;
            gap: 9px;
            font-size: 13px;
            color: #fca5a5;
      }

          .stat-num {
            font-size: 18px;
            font-weight: 700;
            color: #fff;
                     }

            .panel-sep {
            height: 1px;
            background: #7f1d1d;
            margin: 20px 0;
        }

            .panel-note {
              font-size: 11.5px;
            color: #ef4444;
            line-height: 1.6;
        }

        
            .main {
             padding: 32px;
            overflow-y: auto;
        }

        .main-top {
              display: flex;
            align-items: center;
              justify-content: space-between;
            margin-bottom: 24px;
        }

        .main-top h1 {
            font-size: 20px;
            font-weight: 700;
            color: var(--crimson);
        }

        .total-chip {
              background: var(--light);
            color: var(--rose);
            font-size: 12px;
              font-weight: 600;
            padding: 4px 12px;
             border-radius: 20px;
              border: 1px solid var(--muted);
        }

        
        .alert-bar {
              background: var(--light);
            border-left: 4px solid var(--rose);
                color: var(--crimson);
             padding: 11px 16px;
             border-radius: 8px;
            font-size: 13px;
             margin-bottom: 20px;
            display: flex;
             align-items: center;
            gap: 8px;
        }

        
        .table-wrap {
            background: var(--card);
            border-radius: 14px;
            border: 1px solid var(--border);
            overflow: hidden;
        }

        table { width: 100%; border-collapse: collapse; }

         thead { background: #fff5f5; }

        th {
             padding: 12px 18px;
            text-align: left;
            font-size: 11px;
             font-weight: 700;
              color: var(--rose);
            text-transform: uppercase;
            letter-spacing: 0.6px;
            border-bottom: 1px solid var(--border);
        }

        td {
            padding: 14px 18px;
              font-size: 13.5px;
            border-bottom: 1px solid #fff5f5;
            vertical-align: middle;
        }

        tr:last-child td { border-bottom: none; }
        tr:hover td { background: #fff5f5; }

        
        tr.row-pending   td:first-child { border-left: 3px solid #f87171; }
        tr.row-completed td:first-child { border-left: 3px solid #4ade80; }

        .t-name   { font-weight: 600; color: var(--text); }
        .t-desc { font-size: 12px; color: #9b2c2c; margin-top: 2px; }

             .badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
             padding: 4px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

             .badge-pending   { background: #fee2e2; color: #991b1b; }
        .badge-completed { background: #dcfce7; color: #166534; }

        .badge-dot { width: 6px; height: 6px; border-radius: 50%; }
        .badge-pending   .badge-dot { background: #ef4444; }
        .badge-completed .badge-dot { background: #22c55e; }

        .acts { display: flex; gap: 6px; }

     .abtn {
            display: inline-flex;
            align-items: center;
             gap: 4px;
            padding: 5px 12px;
            border-radius: 7px;
               font-size: 12px;
            font-weight: 600;
            border: none;
            cursor: pointer;
            text-decoration: none;
            font-family: inherit;
             transition: opacity 0.15s;
        }
        .abtn:hover { opacity: 0.8; }

                .abtn-edit { background: #fff5f5; color: #7f1d1d; border: 1px solid #fecaca; }
             .abtn-done { background: #dcfce7; color: #166534; }
            .abtn-undo { background: #fef9c3; color: #854d0e; }
                .abtn-del  { background: #fee2e2; color: #991b1b; }

        
        .empty {
              text-align: center;
            padding: 64px 24px;
        }

        .empty-box {
            width: 54px; height: 54px;
            background: var(--light);
             border-radius: 14px;
             display: flex;
            align-items: center;
             justify-content: center;
            margin: 0 auto 14px;
            color: var(--rose);
        }

        .empty h3 { font-size: 15px; font-weight: 700; color: var(--crimson); margin-bottom: 5px; }
        .empty p  { font-size: 13px; color: var(--sub); }
    </style>
</head>
<body>

<header class="header">
    <div class="header-left">
        <div class="logo">    <i data-lucide="check-square" style="width:18px;height:18px;"></i> </div>
        <span class="app-name">Task Manager</span> </div>
    <div class="header-right">
    <span class="header-date">{{ now()->format('M d, Y') }}</span>
<a href="{{ route('tasks.create') }}" class="btn-new">
            <i data-lucide="plus" style="width:14px;height:14px;"></i>
            New Task
        </a>
    </div>
        </header>
<div class="body">
 <aside class="panel">
 <div class="panel-label">Overview</div>
 <div class="stat-item">
     <div class="stat-item-left">
                <i data-lucide="list" style="width:14px;height:14px;"></i>
          All Tasks </div>
        <span class="stat-num">{{ $counts['total'] }}</span>  </div><div class="stat-item">
        <div class="stat-item-left">
                <i data-lucide="clock" style="width:14px;height:14px;"></i>
     Pending
            </div>
            <span class="stat-num">{{ $counts['pending'] }}</span>
        </div>
        <div class="stat-item">
  <div class="stat-item-left">
          <i data-lucide="check-circle" style="width:14px;height:14px;"></i>
                Done
            </div>
            <span class="stat-num">{{ $counts['completed'] }}</span> </div>
        <div class="panel-sep"></div>
        <div class="panel-note">
            Red border = Pending<br><br>
            Green border = Completed
    </div>
    </aside>  <main class="main">
<div class="main-top">
    <h1>All Tasks</h1>
 <span class="total-chip">{{ $counts['total'] }} {{ $counts['total'] === 1 ? 'task' : 'tasks' }}</span>
</div>  @if(session('alert'))
        <div class="alert-bar">
  <i data-lucide="check-circle-2" style="width:15px;height:15px;flex-shrink:0;"></i>
      {{ session('alert') }}
     </div>
        @endif <div class="table-wrap">
            @if($records->isEmpty())
        <div class="empty">
    <div class="empty-box">
   <i data-lucide="inbox" style="width:26px;height:26px;"></i>
       </div>
        <h3>No tasks found</h3>
                <p>Click <strong>New Task</strong> to add your first task.</p>
            </div>
            @else  <table>
         <thead>
                    <tr>
              <th>Task</th>
                 <th>Due Date</th>
                  <th>Status</th>
                     <th>Actions</th>
                    </tr>
        </thead>
           <tbody>
          @foreach($records as $record)
         <tr class="row-{{ strtolower($record->status) }}">
                        <td>
                            <div class="t-name">{{ $record->task_name }}</div>
              @if($record->description)
                            <div class="t-desc">{{ $record->description }}</div>
                            @endif
                        </td>
              <td style="font-size:13px;color:#9b2c2c;">
                            {{ $record->due_date ? $record->due_date->format('M d, Y') : '—' }}
             </td>
                <td>
                     <span class="badge {{ $record->isCompleted() ? 'badge-completed' : 'badge-pending' }}">
                    <span class="badge-dot"></span>
                        {{ $record->status }}
                            </span>
             </td>
            <td>
                  <div class="acts">
                           <a href="{{ route('tasks.edit', $record) }}" class="abtn abtn-edit">
                        <i data-lucide="pencil" style="width:11px;height:11px;"></i>
                         Edit
                     </a>
          <form action="{{ route('tasks.updateStatus', $record) }}" method="POST" style="display:inline">
                    @csrf @method('PATCH')
                        @if($record->isPending())
                       <button type="submit" class="abtn abtn-done">
                                        <i data-lucide="check" style="width:11px;height:11px;"></i>
                              Complete
           </button>
                          @else
                       <button type="submit" class="abtn abtn-undo">
              <i data-lucide="rotate-ccw" style="width:11px;height:11px;"></i>
                           Reopen
                        </button>
                          @endif
                    </form>
           <form action="{{ route('tasks.destroy', $record) }}" method="POST" style="display:inline" onsubmit="return confirm('Are you sure you want to delete this task?')">
                    @csrf @method('DELETE')
              <button type="submit" class="abtn abtn-del">
                                        <i data-lucide="trash-2" style="width:11px;height:11px;"></i>
                                    Delete
                      </button>
                    </form>
                     </div>
             </td>
                    </tr>
         @endforeach
         </tbody>
           </table>
   @endif
     </div>
 </main>
</div>

<script>lucide.createIcons();</script>
</body>
</html>