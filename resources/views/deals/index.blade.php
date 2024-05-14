<x-layout title="Deals" heading="Deals">
<header class="bg-white shadow">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 flex justify-between items-center">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">Deals</h1>
        <a href="/deal/create" class="ml-5 font-medium text-red-600 dark:text-red-500 hover:underline">New Deal</a>
    </div>
  </header>
  <main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
            <tr class="text-center">
                <th scope="col" class="px-6 py-3">
                    Deal Id
                </th>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3">
                    Phone
                </th>
                <th scope="col" class="px-6 py-3">
                    Amount
                </th>
                <th scope="col" class="px-6 py-3">
                    Follow Up Date
                </th>
                <th scope="col" class="px-6 py-3">
                    Status
                </th>
                <th scope="col" class="px-6 py-3">
                    Tasks
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($deals as $deal)
            <tr class="odd:bg-white  border-b dark:border-gray-700 text-center">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    {{ $deal->id }}
                </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    {{ $deal->name }}
                </th>
                <td class="px-6 py-4">
                {{ $deal->email }}
                </td>
                <td class="px-6 py-4">
                {{ $deal->phone }}
                </td>
                <td class="px-6 py-4">
                {{ $deal->amount }}
                </td>
                <td class="px-6 py-4">
                {{ $deal->next_follup_date }}
                </td>
                <td class="px-6 py-4">
                {{ $deal->status ? 'Active' : 'Not Active' }}
                </td>
                <td class="px-6 py-4">
                    <a href="/deal/{{ $deal->id }}/tasks" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View</a>
                </td>
                <td class="px-6 py-4 flex ">
                    <a href="/deal/edit/{{ $deal->id }}" class="ml-5 font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    <form action="/deal/delete" method="POST">
                        @csrf
                        <input type="hidden" name="deal_id" value="{{ $deal->id }}">
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