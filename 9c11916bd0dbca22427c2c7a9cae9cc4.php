<?php 
/**
 * articles.sape.ru - ������� ���������� ������
 *
 * 
 * ��������! 
 * ��� ��  ��� ������ �������, � ���� ��� ����������� ������� ������.
 * 
 * � ����� � ����:
 * 
 * 1) �� ������� ��������� ��� �� ����� ����� � ������ ����� ������ �����! 
 *    ������ ������� ���� ����������� ��� �� ���������� http://articles.sape.ru/wm/sites/add/
 *  
 * 2) �� ������� �������� ������ ���� � ������ � ������� ������� ���� include/require!
 * 
 * ��������������, ��� ������ ���� ���������� ������ ���-��������, � ������ ������� URL ������.
 * 
 * ����� ������� ���� �� ��������� ����� ����� �������� � �� ������������� �����������.
 * 
 * �������: https://help.sape.ru/articles/faq
 *
 * �� ���� �������� ����������� �� support@sape.ru
 *
 */ 
     define('_SAPE_USER', '9c11916bd0dbca22427c2c7a9cae9cc4');
     require_once($_SERVER['DOCUMENT_ROOT'].'/'._SAPE_USER.'/sape.php'); 
     $sape_articles = new SAPE_articles();
     //������ ����� ����� ���������� HTTP ��������� c ����� 404! �� ������� ��������� ��� �� �������� � ��������.     
     echo $sape_articles->process_request();
?>
