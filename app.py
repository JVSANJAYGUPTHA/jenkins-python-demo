def find_min(numbers):
    if not numbers:
        raise ValueError("List cannot be empty")
    return min(numbers)

def count_odds(numbers):
    return sum(1 for n in numbers if n % 2 != 0)