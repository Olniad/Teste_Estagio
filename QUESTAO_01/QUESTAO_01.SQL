--A)
select nome_cliente, cpf_cliente, rg_cliente, telmask_cliente, email_cliente from clientes;

--B)
select count(id_compra) from compras where sel_status_compra = 'concluido' order by 1;


