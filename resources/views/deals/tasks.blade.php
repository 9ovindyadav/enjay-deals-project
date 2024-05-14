<x-layout title="Deals" heading="Deals">
<header class="bg-white shadow">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 flex justify-between items-center">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">Deal {{ $deal->id }} Tasks</h1>
        <a href="/deal/{{ $deal->id }}/task/create" class="ml-5 font-medium text-red-600 dark:text-red-500 hover:underline">New Task</a>
    </div>
  </header>
  <main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
            <tr class="text-center">
                <th scope="col" class="px-6 py-3">
                    Task Id
                </th>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Start Date
                </th>
                <th scope="col" class="px-6 py-3">
                    End Date
                </th>
                <th scope="col" class="px-6 py-3">
                    Duration
                </th>
                <th scope="col" class="px-6 py-3">
                    Status
                </th>
                <th scope="col" class="px-6 py-3">
                    Description
                </th>
                <th scope="col" class="px-6 py-3">
                    Comment
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($deal->tasks as $task)
            <tr class="odd:bg-white  border-b dark:border-gray-700 text-center">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    {{ $task->id }}
                </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    {{ $task->name }}
                </th>
                <td class="px-6 py-4">
                {{ $task->start_date }}
                </td>
                <td class="px-6 py-4">
                {{ $task->end_date }}
                </td>
                <td class="px-6 py-4">
                
                </td>
                <td class="px-6 py-4">
                {{ $task->status ? 'Active' : 'Not Active' }}
                </td>
                <td class="px-6 py-4">
                {{ $task->description }}
                </td>
                <td class="px-6 py-4">
                {{ $task->comment }}
                </td>
                <td class="px-6 py-4 flex ">
                    <a href="/task/edit/{{ $task->id }}" class="ml-5 font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    <form action="/task/delete" method="POST">
                        @csrf
                        <input type="hidden" name="task_id" value="{{ $task->id }}">
                        <button type="submit" class="ml-5 font-medium text-red-600 dark:text-red-500 hover:underline">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
    </div>
  </main>

</x-layout>