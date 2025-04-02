<?php
session_start();

header('Content-Type: application/json');

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$response = ['success' => false];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;
    $action = $_POST['action'] ?? null;

    if ($id && $action && isset($_SESSION['cart'][$id])) {
        switch ($action) {
            case 'increase':
                $_SESSION['cart'][$id]['quantity'] += 1;
                $response['success'] = true;
                break;
                
            case 'decrease':
                if ($_SESSION['cart'][$id]['quantity'] > 1) {
                    $_SESSION['cart'][$id]['quantity'] -= 1;
                } else {
                    unset($_SESSION['cart'][$id]);
                }
                $response['success'] = true;
                break;
                
            case 'remove':
                unset($_SESSION['cart'][$id]);
                $response['success'] = true;
                break;
        }
    }
}

echo json_encode($response);