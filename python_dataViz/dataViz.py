import csv
from itertools import product

def convert_to_float(val):
    try: 
        converted_value = float(val)
    except ValueError:
        converted_value = 0
    return converted_value

def get_products_by_price(min_price, max_price):

    ProductList = []
    
    with open('Amazon-Products.csv', 'r', newline='') as csvfile:
        reader = csv.DictReader(csvfile)
        for row in reader:
            ProductList.append(row)

    for product_dict in ProductList:
        price = product_dict["discount_price"].replace("₹","").replace(",",".")
        product_dict["discount_price"] = convert_to_float(price)
    
    new_data = []
    for product_dict in ProductList:
        if product_dict["discount_price"] >= min_price and product_dict["discount_price"] <= max_price:
            new_data.append(product_dict)

    return new_data
        
# print(get_products_by_price(30,40)) 

def get_products_by_category(main_category):

    ProductList = []

    with open('Amazon-Products.csv', 'r', newline='') as csvfile:
        reader = csv.DictReader(csvfile)
        for row in reader:
            ProductList.append(row)
        
        new_data = []
        for product_dict in ProductList:
            if product_dict["main_category"] == main_category:
                new_data.append(product_dict)
        
        return new_data

# print(len(get_products_by_category("appliances")))

def get_products_if_discount():

    ProductList = []

    with open('Amazon-Products.csv', 'r', newline='') as csvfile:
        reader = csv.DictReader(csvfile)
        for row in reader:
            ProductList.append(row)

    new_data = []
    for product_dict in ProductList:
        if product_dict["discount_price"] != product_dict["actual_price"]:
            new_data.append(ProductList)

    return new_data

# print(len(get_products_if_discount()))


def get_number_of_product():

    ProductList = []

    with open('Amazon-Products.csv', 'r', newline='') as csvfile:
        reader = csv.DictReader(csvfile)
        for row in reader:
            ProductList.append(row)

    category_products = {}

    for product_dict in ProductList:
        category = product_dict["main_category"]
        name = product_dict["name"]
        if category in category_products:
            category_products[category].append(name)
        else:
            category_products[category] = [name]

    len_category_product = {}
    for category in category_products:
        len(category_products[category])
        len_category_product[category] = len(category_products[category])
        
    return len_category_product

# print(get_number_of_product())